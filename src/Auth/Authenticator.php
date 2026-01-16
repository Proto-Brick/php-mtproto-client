<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Auth;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Crypto\Srp;
use ProtoBrick\MTProtoClient\Exception\RpcErrorException;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetPasswordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\CheckPasswordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\SendCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\SignInRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\SignUpRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Users\GetUsersRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Account\Password;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\Authorization;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\SentCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\CodeSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\User;
use ProtoBrick\MTProtoClient\Logger\LogChannel;

readonly class Authenticator
{
    public function __construct(
        private Client $client
    ) {
    }

    public function login(
        string $phoneNumber,
        callable $codeProvider,
        ?callable $passwordProvider = null,
        ?callable $signupProvider = null
    ): Authorization {
        $this->client->logger->info("Sending verification code to {$phoneNumber}...", ['channel' => LogChannel::AUTH]);

        $settings = $this->client->getSettings();
        $sendCodeRes = $this->client->callSync(
            new SendCodeRequest(
                phoneNumber: $phoneNumber,
                apiId: $settings->api_id,
                apiHash: $settings->api_hash,
                settings: new CodeSettings()
            )
        );

        if (!$sendCodeRes instanceof SentCode) {
            throw new \RuntimeException("Unexpected response from sendCode: " . get_class($sendCodeRes));
        }

        $phoneCodeHash = $sendCodeRes->phoneCodeHash;
        $attempt = 0;
        $maxAttempts = 3;

        while ($attempt < $maxAttempts) {
            $code = $codeProvider();

            try {
                $auth = $this->client->callSync(
                    new SignInRequest(
                        phoneNumber: $phoneNumber,
                        phoneCodeHash: $phoneCodeHash,
                        phoneCode: (string)$code
                    )
                );

                if ($auth instanceof Authorization) {
                    $this->client->logger->info("Successfully logged in.", ['channel' => LogChannel::AUTH]);
                    return $auth;
                }
                throw new \RuntimeException("SignIn returned unexpected type.");
            } catch (RpcErrorException $e) {
                if ($e->errorMessage === 'PHONE_CODE_INVALID') {
                    $attempt++;
                    $this->client->logger->warning(
                        "❌ Invalid code ($attempt/$maxAttempts). Try again.",
                        ['channel' => LogChannel::AUTH]
                    );
                    continue;
                }

                if ($e->errorMessage === 'SESSION_PASSWORD_NEEDED') {
                    return $this->handle2FA($passwordProvider);
                }

                if ($e->errorMessage === 'PHONE_NUMBER_UNOCCUPIED') {
                    return $this->handleSignUp($phoneNumber, $phoneCodeHash, $signupProvider);
                }

                throw $e;
            }
        }

        $this->client->logger->error(
            "Too many invalid code attempts.",
            ['channel' => LogChannel::AUTH]
        );

        throw new \RuntimeException("Too many invalid code attempts.");
    }

    private function handle2FA(?callable $passwordProvider): Authorization
    {
        $this->client->logger->info("🔐 Two-step verification (2FA) enabled.", ['channel' => LogChannel::AUTH]);

        // Если провайдер не задан, запрашиваем ввод в консоли (скрытый)
        if ($passwordProvider === null && php_sapi_name() === 'cli') {
            $input = $this->readPassword("Enter Cloud Password (2FA): ");
            if ($input !== '') {
                $passwordProvider = static fn() => $input;
            }
        }

        if ($passwordProvider === null) {
            throw new \RuntimeException("Cloud password required but provider is null.");
        }

        $settings = $this->client->callSync(new GetPasswordRequest());
        if (!$settings instanceof Password) {
            throw new \RuntimeException("Failed to fetch password settings.");
        }

        $srpInput = Srp::compute($settings, $passwordProvider());

        $auth = $this->client->callSync(new CheckPasswordRequest($srpInput));
        if ($auth instanceof Authorization) {
            $this->client->logger->info("✅ Cloud password accepted.", ['channel' => LogChannel::AUTH]);
            return $auth;
        }

        throw new \RuntimeException("Cloud password check failed.");
    }

    /**
     * Читает ввод из терминала, скрывая вводимые символы.
     */
    private function readPassword(string $prompt): string
    {
        echo $prompt;

        if (PHP_OS_FAMILY === 'Windows') {
            // Используем PowerShell для безопасного ввода на Windows
            $command = 'powershell -Command "$p = Read-Host -AsSecureString; $p = [Runtime.InteropServices.Marshal]::PtrToStringAuto([Runtime.InteropServices.Marshal]::SecureStringToBSTR($p)); echo $p"';
            $password = rtrim((string)shell_exec($command));
            echo "\n";
            return $password;
        }

        // Для Linux / macOS используем stty
        $oldStyle = shell_exec('stty -g');
        shell_exec('stty -echo');
        $password = rtrim((string)fgets(STDIN));
        shell_exec('stty ' . $oldStyle);
        echo "\n";
        return $password;
    }

    private function handleSignUp(string $phoneNumber, string $phoneCodeHash, ?callable $signupProvider): Authorization
    {
        $this->client->logger->notice(
            "Phone number unoccupied. Registration required.",
            ['channel' => LogChannel::AUTH]
        );

        if ($signupProvider === null) {
            throw new \RuntimeException("Registration required but signup provider is null.");
        }

        [$firstName, $lastName] = $signupProvider();

        $auth = $this->client->callSync(
            new SignUpRequest(
                phoneNumber: $phoneNumber,
                phoneCodeHash: $phoneCodeHash,
                firstName: $firstName,
                lastName: $lastName ?? ''
            )
        );

        if ($auth instanceof Authorization) {
            $this->client->logger->info("Registration successful.", ['channel' => LogChannel::AUTH]);
            return $auth;
        }

        throw new \RuntimeException("Sign Up failed.");
    }
}