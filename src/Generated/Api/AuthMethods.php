<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\AcceptLoginTokenRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\BindTempAuthKeyRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\CancelCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\CheckPasswordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\CheckRecoveryPasswordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\DropTempAuthKeysRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ExportAuthorizationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ExportLoginTokenRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ImportAuthorizationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ImportBotAuthorizationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ImportLoginTokenRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ImportWebTokenAuthorizationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\LogOutRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\RecoverPasswordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ReportMissingCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\RequestFirebaseSmsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\RequestPasswordRecoveryRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ResendCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ResetAuthorizationsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ResetLoginEmailRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\SendCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\SignInRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\SignUpRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Account\PasswordInputSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractAuthorization;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractLoginToken;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractSentCode;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\Authorization;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\AuthorizationSignUpRequired;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\ExportedAuthorization;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\LoggedOut;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\LoginToken;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\LoginTokenMigrateTo;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\LoginTokenSuccess;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\PasswordRecovery;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\SentCode;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\SentCodePaymentRequired;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\SentCodeSuccess;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmailVerification;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Authorization as BaseAuthorization;
use ProtoBrick\MTProtoClient\Generated\Types\Base\CodeSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmailVerificationApple;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmailVerificationCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmailVerificationGoogle;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCheckPasswordEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCheckPasswordSRP;


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
     * @return SentCode|SentCodeSuccess|SentCodePaymentRequired|null
     * @see https://core.telegram.org/method/auth.sendCode
     * @api
     */
    public function sendCode(string $phoneNumber, int $apiId, string $apiHash, CodeSettings $settings): ?AbstractSentCode
    {
        return $this->client->callSync(new SendCodeRequest(phoneNumber: $phoneNumber, apiId: $apiId, apiHash: $apiHash, settings: $settings));
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
        return $this->client->callSync(new SignUpRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, firstName: $firstName, lastName: $lastName, noJoinedNotifications: $noJoinedNotifications));
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
        return $this->client->callSync(new SignInRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, phoneCode: $phoneCode, emailVerification: $emailVerification));
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
        return $this->client->callSync(new ExportAuthorizationRequest(dcId: $dcId));
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
        return $this->client->callSync(new ImportAuthorizationRequest(id: $id, bytes: $bytes));
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
        return (bool) $this->client->callSync(new BindTempAuthKeyRequest(permAuthKeyId: $permAuthKeyId, nonce: $nonce, expiresAt: $expiresAt, encryptedMessage: $encryptedMessage));
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
        return $this->client->callSync(new ImportBotAuthorizationRequest(flags: $flags, apiId: $apiId, apiHash: $apiHash, botAuthToken: $botAuthToken));
    }

    /**
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return Authorization|AuthorizationSignUpRequired|null
     * @see https://core.telegram.org/method/auth.checkPassword
     * @api
     */
    public function checkPassword(AbstractInputCheckPasswordSRP $password): ?AbstractAuthorization
    {
        return $this->client->callSync(new CheckPasswordRequest(password: $password));
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
        return $this->client->callSync(new RecoverPasswordRequest(code: $code, newSettings: $newSettings));
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string|null $reason
     * @return SentCode|SentCodeSuccess|SentCodePaymentRequired|null
     * @see https://core.telegram.org/method/auth.resendCode
     * @api
     */
    public function resendCode(string $phoneNumber, string $phoneCodeHash, ?string $reason = null): ?AbstractSentCode
    {
        return $this->client->callSync(new ResendCodeRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, reason: $reason));
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
        return (bool) $this->client->callSync(new CancelCodeRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash));
    }

    /**
     * @param list<int> $exceptAuthKeys
     * @return bool
     * @see https://core.telegram.org/method/auth.dropTempAuthKeys
     * @api
     */
    public function dropTempAuthKeys(array $exceptAuthKeys): bool
    {
        return (bool) $this->client->callSync(new DropTempAuthKeysRequest(exceptAuthKeys: $exceptAuthKeys));
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
        return $this->client->callSync(new ExportLoginTokenRequest(apiId: $apiId, apiHash: $apiHash, exceptIds: $exceptIds));
    }

    /**
     * @param string $token
     * @return LoginToken|LoginTokenMigrateTo|LoginTokenSuccess|null
     * @see https://core.telegram.org/method/auth.importLoginToken
     * @api
     */
    public function importLoginToken(string $token): ?AbstractLoginToken
    {
        return $this->client->callSync(new ImportLoginTokenRequest(token: $token));
    }

    /**
     * @param string $token
     * @return BaseAuthorization|null
     * @see https://core.telegram.org/method/auth.acceptLoginToken
     * @api
     */
    public function acceptLoginToken(string $token): ?BaseAuthorization
    {
        return $this->client->callSync(new AcceptLoginTokenRequest(token: $token));
    }

    /**
     * @param string $code
     * @return bool
     * @see https://core.telegram.org/method/auth.checkRecoveryPassword
     * @api
     */
    public function checkRecoveryPassword(string $code): bool
    {
        return (bool) $this->client->callSync(new CheckRecoveryPasswordRequest(code: $code));
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
        return $this->client->callSync(new ImportWebTokenAuthorizationRequest(apiId: $apiId, apiHash: $apiHash, webAuthToken: $webAuthToken));
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
        return (bool) $this->client->callSync(new RequestFirebaseSmsRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, safetyNetToken: $safetyNetToken, playIntegrityToken: $playIntegrityToken, iosPushSecret: $iosPushSecret));
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @return SentCode|SentCodeSuccess|SentCodePaymentRequired|null
     * @see https://core.telegram.org/method/auth.resetLoginEmail
     * @api
     */
    public function resetLoginEmail(string $phoneNumber, string $phoneCodeHash): ?AbstractSentCode
    {
        return $this->client->callSync(new ResetLoginEmailRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash));
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
        return (bool) $this->client->callSync(new ReportMissingCodeRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, mnc: $mnc));
    }
}