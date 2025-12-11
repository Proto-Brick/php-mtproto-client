<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Auth;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Crypto\SRP;
use ProtoBrick\MTProtoClient\Exception\RpcErrorException;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetPasswordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\CheckPasswordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\SendCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\SignInRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\SignUpRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Account\Password;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\Authorization;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\SentCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\CodeSettings;

readonly class Authenticator
{
    public function __construct(
        private Client $client
    ) {}

    /**
     * Performs a complete authorization flow including 2FA and Sign Up.
     *
     * @param string $phoneNumber Format: "+1234567890"
     * @param callable(): string $codeProvider Returns the verification code.
     * @param callable(): string|null $passwordProvider Returns the 2FA cloud password (optional).
     * @param callable(): array{string, string}|null $signupProvider Returns [FirstName, LastName] for new accounts (optional).
     * @throws RpcErrorException
     */
    public function login(
        string $phoneNumber,
        callable $codeProvider,
        ?callable $passwordProvider = null,
        ?callable $signupProvider = null
    ): Authorization {
        $settings = $this->client->getSettings();

        // 1. Send verification code
        $sendCodeRes = $this->client->callSync(new SendCodeRequest(
            phoneNumber: $phoneNumber,
            apiId: $settings->api_id,
            apiHash: $settings->api_hash,
            settings: new CodeSettings()
        ));

        if (!$sendCodeRes instanceof SentCode) {
            throw new \RuntimeException("Unexpected response from sendCode: " . get_class($sendCodeRes));
        }

        $phoneCodeHash = $sendCodeRes->phoneCodeHash;

        // 2. Retrieve code via callback
        $code = $codeProvider();

        // 3. Attempt sign in
        try {
            $auth = $this->client->callSync(new SignInRequest(
                phoneNumber: $phoneNumber,
                phoneCodeHash: $phoneCodeHash,
                phoneCode: (string)$code
            ));

            if ($auth instanceof Authorization) {
                return $auth;
            }
            throw new \RuntimeException("SignIn returned unexpected type.");

        } catch (RpcErrorException $e) {
            // Handle 2FA
            if ($e->errorMessage === 'SESSION_PASSWORD_NEEDED') {
                if ($passwordProvider === null) {
                    throw new \RuntimeException("2FA password required but provider is null.");
                }

                $passwordSettings = $this->client->callSync(new GetPasswordRequest());
                if (!$passwordSettings instanceof Password) {
                    throw new \RuntimeException("Failed to fetch password settings.");
                }

                $password = $passwordProvider();
                $srpInput = SRP::compute($passwordSettings, $password);

                $auth = $this->client->callSync(new CheckPasswordRequest($srpInput));
                if ($auth instanceof Authorization) {
                    return $auth;
                }
            }
            // Handle New Account Registration
            elseif ($e->errorMessage === 'PHONE_NUMBER_UNOCCUPIED') {
                if ($signupProvider === null) {
                    throw new \RuntimeException("Phone number not registered and signup provider is null.");
                }

                [$firstName, $lastName] = $signupProvider();

                $auth = $this->client->callSync(new SignUpRequest(
                    phoneNumber: $phoneNumber,
                    phoneCodeHash: $phoneCodeHash,
                    firstName: $firstName,
                    lastName: $lastName ?? ''
                ));

                if ($auth instanceof Authorization) {
                    return $auth;
                }
            }

            throw $e;
        }

        throw new \RuntimeException("Authorization failed to complete.");
    }
}