<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\AcceptLoginTokenRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\BindTempAuthKeyRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\CancelCodeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\CheckPasswordRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\CheckRecoveryPasswordRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\DropTempAuthKeysRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\ExportAuthorizationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\ExportLoginTokenRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\ImportAuthorizationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\ImportBotAuthorizationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\ImportLoginTokenRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\ImportWebTokenAuthorizationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\LogOutRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\RecoverPasswordRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\ReportMissingCodeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\RequestFirebaseSmsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\RequestPasswordRecoveryRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\ResendCodeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\ResetAuthorizationsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\ResetLoginEmailRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\SendCodeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\SignInRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Auth\SignUpRequest;
use DigitalStars\MtprotoClient\Generated\Types\Account\PasswordInputSettings;
use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractAuthorization;
use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractLoginToken;
use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractSentCode;
use DigitalStars\MtprotoClient\Generated\Types\Auth\Authorization;
use DigitalStars\MtprotoClient\Generated\Types\Auth\AuthorizationSignUpRequired;
use DigitalStars\MtprotoClient\Generated\Types\Auth\ExportedAuthorization;
use DigitalStars\MtprotoClient\Generated\Types\Auth\LoggedOut;
use DigitalStars\MtprotoClient\Generated\Types\Auth\LoginToken;
use DigitalStars\MtprotoClient\Generated\Types\Auth\LoginTokenMigrateTo;
use DigitalStars\MtprotoClient\Generated\Types\Auth\LoginTokenSuccess;
use DigitalStars\MtprotoClient\Generated\Types\Auth\PasswordRecovery;
use DigitalStars\MtprotoClient\Generated\Types\Auth\SentCode;
use DigitalStars\MtprotoClient\Generated\Types\Auth\SentCodeSuccess;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmailVerification;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\Authorization as BaseAuthorization;
use DigitalStars\MtprotoClient\Generated\Types\Base\CodeSettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmailVerificationApple;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmailVerificationCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmailVerificationGoogle;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordSRP;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "auth" group.
 */
final readonly class AuthMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param string $phoneNumber
     * @param int $apiId
     * @param string $apiHash
     * @param CodeSettings $settings
     * @return SentCode|SentCodeSuccess|null
     * @see https://core.telegram.org/method/auth.sendCode
     * @api
     */
    public function sendCode(string $phoneNumber, int $apiId, string $apiHash, CodeSettings $settings): ?AbstractSentCode
    {
        return $this->client->callSync(new SendCodeRequest($phoneNumber, $apiId, $apiHash, $settings));
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $firstName
     * @param string $lastName
     * @param bool|null $noJoinedNotifications
     * @return Authorization|AuthorizationSignUpRequired|null
     * @see https://core.telegram.org/method/auth.signUp
     * @api
     */
    public function signUp(string $phoneNumber, string $phoneCodeHash, string $firstName, string $lastName, ?bool $noJoinedNotifications = null): ?AbstractAuthorization
    {
        return $this->client->callSync(new SignUpRequest($phoneNumber, $phoneCodeHash, $firstName, $lastName, $noJoinedNotifications));
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string|null $phoneCode
     * @param EmailVerificationCode|EmailVerificationGoogle|EmailVerificationApple|null $emailVerification
     * @return Authorization|AuthorizationSignUpRequired|null
     * @see https://core.telegram.org/method/auth.signIn
     * @api
     */
    public function signIn(string $phoneNumber, string $phoneCodeHash, ?string $phoneCode = null, ?AbstractEmailVerification $emailVerification = null): ?AbstractAuthorization
    {
        return $this->client->callSync(new SignInRequest($phoneNumber, $phoneCodeHash, $phoneCode, $emailVerification));
    }

    /**
     * @return LoggedOut|null
     * @see https://core.telegram.org/method/auth.logOut
     * @api
     */
    public function logOut(): ?LoggedOut
    {
        return $this->client->callSync(new LogOutRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/auth.resetAuthorizations
     * @api
     */
    public function resetAuthorizations(): bool
    {
        return (bool) $this->client->callSync(new ResetAuthorizationsRequest());
    }

    /**
     * @param int $dcId
     * @return ExportedAuthorization|null
     * @see https://core.telegram.org/method/auth.exportAuthorization
     * @api
     */
    public function exportAuthorization(int $dcId): ?ExportedAuthorization
    {
        return $this->client->callSync(new ExportAuthorizationRequest($dcId));
    }

    /**
     * @param int $id
     * @param string $bytes
     * @return Authorization|AuthorizationSignUpRequired|null
     * @see https://core.telegram.org/method/auth.importAuthorization
     * @api
     */
    public function importAuthorization(int $id, string $bytes): ?AbstractAuthorization
    {
        return $this->client->callSync(new ImportAuthorizationRequest($id, $bytes));
    }

    /**
     * @param int $permAuthKeyId
     * @param int $nonce
     * @param int $expiresAt
     * @param string $encryptedMessage
     * @return bool
     * @see https://core.telegram.org/method/auth.bindTempAuthKey
     * @api
     */
    public function bindTempAuthKey(int $permAuthKeyId, int $nonce, int $expiresAt, string $encryptedMessage): bool
    {
        return (bool) $this->client->callSync(new BindTempAuthKeyRequest($permAuthKeyId, $nonce, $expiresAt, $encryptedMessage));
    }

    /**
     * @param int $flags
     * @param int $apiId
     * @param string $apiHash
     * @param string $botAuthToken
     * @return Authorization|AuthorizationSignUpRequired|null
     * @see https://core.telegram.org/method/auth.importBotAuthorization
     * @api
     */
    public function importBotAuthorization(int $flags, int $apiId, string $apiHash, string $botAuthToken): ?AbstractAuthorization
    {
        return $this->client->callSync(new ImportBotAuthorizationRequest($flags, $apiId, $apiHash, $botAuthToken));
    }

    /**
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return Authorization|AuthorizationSignUpRequired|null
     * @see https://core.telegram.org/method/auth.checkPassword
     * @api
     */
    public function checkPassword(AbstractInputCheckPasswordSRP $password): ?AbstractAuthorization
    {
        return $this->client->callSync(new CheckPasswordRequest($password));
    }

    /**
     * @return PasswordRecovery|null
     * @see https://core.telegram.org/method/auth.requestPasswordRecovery
     * @api
     */
    public function requestPasswordRecovery(): ?PasswordRecovery
    {
        return $this->client->callSync(new RequestPasswordRecoveryRequest());
    }

    /**
     * @param string $code
     * @param PasswordInputSettings|null $newSettings
     * @return Authorization|AuthorizationSignUpRequired|null
     * @see https://core.telegram.org/method/auth.recoverPassword
     * @api
     */
    public function recoverPassword(string $code, ?PasswordInputSettings $newSettings = null): ?AbstractAuthorization
    {
        return $this->client->callSync(new RecoverPasswordRequest($code, $newSettings));
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string|null $reason
     * @return SentCode|SentCodeSuccess|null
     * @see https://core.telegram.org/method/auth.resendCode
     * @api
     */
    public function resendCode(string $phoneNumber, string $phoneCodeHash, ?string $reason = null): ?AbstractSentCode
    {
        return $this->client->callSync(new ResendCodeRequest($phoneNumber, $phoneCodeHash, $reason));
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @return bool
     * @see https://core.telegram.org/method/auth.cancelCode
     * @api
     */
    public function cancelCode(string $phoneNumber, string $phoneCodeHash): bool
    {
        return (bool) $this->client->callSync(new CancelCodeRequest($phoneNumber, $phoneCodeHash));
    }

    /**
     * @param list<int> $exceptAuthKeys
     * @return bool
     * @see https://core.telegram.org/method/auth.dropTempAuthKeys
     * @api
     */
    public function dropTempAuthKeys(array $exceptAuthKeys): bool
    {
        return (bool) $this->client->callSync(new DropTempAuthKeysRequest($exceptAuthKeys));
    }

    /**
     * @param int $apiId
     * @param string $apiHash
     * @param list<int> $exceptIds
     * @return LoginToken|LoginTokenMigrateTo|LoginTokenSuccess|null
     * @see https://core.telegram.org/method/auth.exportLoginToken
     * @api
     */
    public function exportLoginToken(int $apiId, string $apiHash, array $exceptIds): ?AbstractLoginToken
    {
        return $this->client->callSync(new ExportLoginTokenRequest($apiId, $apiHash, $exceptIds));
    }

    /**
     * @param string $token
     * @return LoginToken|LoginTokenMigrateTo|LoginTokenSuccess|null
     * @see https://core.telegram.org/method/auth.importLoginToken
     * @api
     */
    public function importLoginToken(string $token): ?AbstractLoginToken
    {
        return $this->client->callSync(new ImportLoginTokenRequest($token));
    }

    /**
     * @param string $token
     * @return BaseAuthorization|null
     * @see https://core.telegram.org/method/auth.acceptLoginToken
     * @api
     */
    public function acceptLoginToken(string $token): ?BaseAuthorization
    {
        return $this->client->callSync(new AcceptLoginTokenRequest($token));
    }

    /**
     * @param string $code
     * @return bool
     * @see https://core.telegram.org/method/auth.checkRecoveryPassword
     * @api
     */
    public function checkRecoveryPassword(string $code): bool
    {
        return (bool) $this->client->callSync(new CheckRecoveryPasswordRequest($code));
    }

    /**
     * @param int $apiId
     * @param string $apiHash
     * @param string $webAuthToken
     * @return Authorization|AuthorizationSignUpRequired|null
     * @see https://core.telegram.org/method/auth.importWebTokenAuthorization
     * @api
     */
    public function importWebTokenAuthorization(int $apiId, string $apiHash, string $webAuthToken): ?AbstractAuthorization
    {
        return $this->client->callSync(new ImportWebTokenAuthorizationRequest($apiId, $apiHash, $webAuthToken));
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string|null $safetyNetToken
     * @param string|null $playIntegrityToken
     * @param string|null $iosPushSecret
     * @return bool
     * @see https://core.telegram.org/method/auth.requestFirebaseSms
     * @api
     */
    public function requestFirebaseSms(string $phoneNumber, string $phoneCodeHash, ?string $safetyNetToken = null, ?string $playIntegrityToken = null, ?string $iosPushSecret = null): bool
    {
        return (bool) $this->client->callSync(new RequestFirebaseSmsRequest($phoneNumber, $phoneCodeHash, $safetyNetToken, $playIntegrityToken, $iosPushSecret));
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @return SentCode|SentCodeSuccess|null
     * @see https://core.telegram.org/method/auth.resetLoginEmail
     * @api
     */
    public function resetLoginEmail(string $phoneNumber, string $phoneCodeHash): ?AbstractSentCode
    {
        return $this->client->callSync(new ResetLoginEmailRequest($phoneNumber, $phoneCodeHash));
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $mnc
     * @return bool
     * @see https://core.telegram.org/method/auth.reportMissingCode
     * @api
     */
    public function reportMissingCode(string $phoneNumber, string $phoneCodeHash, string $mnc): bool
    {
        return (bool) $this->client->callSync(new ReportMissingCodeRequest($phoneNumber, $phoneCodeHash, $mnc));
    }
}