<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\AcceptLoginTokenRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\BindTempAuthKeyRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\CancelCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\CheckPaidAuthRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\CheckPasswordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\CheckRecoveryPasswordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\DropTempAuthKeysRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ExportAuthorizationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ExportLoginTokenRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\FinishPasskeyLoginRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ImportAuthorizationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ImportBotAuthorizationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ImportLoginTokenRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\ImportWebTokenAuthorizationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Auth\InitPasskeyLoginRequest;
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
use ProtoBrick\MTProtoClient\Generated\Types\Auth\PasskeyLoginOptions;
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
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPasskeyCredential;


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
     * @return Future<SentCode|SentCodeSuccess|SentCodePaymentRequired|null>
     * @see https://core.telegram.org/method/auth.sendCode
     * @api
     */
    public function sendCodeAsync(string $phoneNumber, int $apiId, string $apiHash, CodeSettings $settings): Future
    {
        return $this->client->call(new SendCodeRequest(phoneNumber: $phoneNumber, apiId: $apiId, apiHash: $apiHash, settings: $settings));
    }

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
        return $this->sendCodeAsync(phoneNumber: $phoneNumber, apiId: $apiId, apiHash: $apiHash, settings: $settings)->await();
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $firstName
     * @param string $lastName
     * @param bool|null $noJoinedNotifications
     * @return Future<Authorization|AuthorizationSignUpRequired|null>
     * @see https://core.telegram.org/method/auth.signUp
     * @api
     */
    public function signUpAsync(string $phoneNumber, string $phoneCodeHash, string $firstName, string $lastName, ?bool $noJoinedNotifications = null): Future
    {
        return $this->client->call(new SignUpRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, firstName: $firstName, lastName: $lastName, noJoinedNotifications: $noJoinedNotifications));
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
        return $this->signUpAsync(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, firstName: $firstName, lastName: $lastName, noJoinedNotifications: $noJoinedNotifications)->await();
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string|null $phoneCode
     * @param EmailVerificationCode|EmailVerificationGoogle|EmailVerificationApple|null $emailVerification
     * @return Future<Authorization|AuthorizationSignUpRequired|null>
     * @see https://core.telegram.org/method/auth.signIn
     * @api
     */
    public function signInAsync(string $phoneNumber, string $phoneCodeHash, ?string $phoneCode = null, ?AbstractEmailVerification $emailVerification = null): Future
    {
        return $this->client->call(new SignInRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, phoneCode: $phoneCode, emailVerification: $emailVerification));
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
        return $this->signInAsync(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, phoneCode: $phoneCode, emailVerification: $emailVerification)->await();
    }

    /**
     * @return Future<LoggedOut|null>
     * @see https://core.telegram.org/method/auth.logOut
     * @api
     */
    public function logOutAsync(): Future
    {
        return $this->client->call(new LogOutRequest());
    }

    /**
     * @return LoggedOut|null
     * @see https://core.telegram.org/method/auth.logOut
     * @api
     */
    public function logOut(): ?LoggedOut
    {
        return $this->logOutAsync()->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/auth.resetAuthorizations
     * @api
     */
    public function resetAuthorizationsAsync(): Future
    {
        return $this->client->call(new ResetAuthorizationsRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/auth.resetAuthorizations
     * @api
     */
    public function resetAuthorizations(): bool
    {
        return (bool) $this->resetAuthorizationsAsync()->await();
    }

    /**
     * @param int $dcId
     * @return Future<ExportedAuthorization|null>
     * @see https://core.telegram.org/method/auth.exportAuthorization
     * @api
     */
    public function exportAuthorizationAsync(int $dcId): Future
    {
        return $this->client->call(new ExportAuthorizationRequest(dcId: $dcId));
    }

    /**
     * @param int $dcId
     * @return ExportedAuthorization|null
     * @see https://core.telegram.org/method/auth.exportAuthorization
     * @api
     */
    public function exportAuthorization(int $dcId): ?ExportedAuthorization
    {
        return $this->exportAuthorizationAsync(dcId: $dcId)->await();
    }

    /**
     * @param int $id
     * @param string $bytes
     * @return Future<Authorization|AuthorizationSignUpRequired|null>
     * @see https://core.telegram.org/method/auth.importAuthorization
     * @api
     */
    public function importAuthorizationAsync(int $id, string $bytes): Future
    {
        return $this->client->call(new ImportAuthorizationRequest(id: $id, bytes: $bytes));
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
        return $this->importAuthorizationAsync(id: $id, bytes: $bytes)->await();
    }

    /**
     * @param int $permAuthKeyId
     * @param int $nonce
     * @param int $expiresAt
     * @param string $encryptedMessage
     * @return Future<bool>
     * @see https://core.telegram.org/method/auth.bindTempAuthKey
     * @api
     */
    public function bindTempAuthKeyAsync(int $permAuthKeyId, int $nonce, int $expiresAt, string $encryptedMessage): Future
    {
        return $this->client->call(new BindTempAuthKeyRequest(permAuthKeyId: $permAuthKeyId, nonce: $nonce, expiresAt: $expiresAt, encryptedMessage: $encryptedMessage));
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
        return (bool) $this->bindTempAuthKeyAsync(permAuthKeyId: $permAuthKeyId, nonce: $nonce, expiresAt: $expiresAt, encryptedMessage: $encryptedMessage)->await();
    }

    /**
     * @param int $flags
     * @param int $apiId
     * @param string $apiHash
     * @param string $botAuthToken
     * @return Future<Authorization|AuthorizationSignUpRequired|null>
     * @see https://core.telegram.org/method/auth.importBotAuthorization
     * @api
     */
    public function importBotAuthorizationAsync(int $flags, int $apiId, string $apiHash, string $botAuthToken): Future
    {
        return $this->client->call(new ImportBotAuthorizationRequest(flags: $flags, apiId: $apiId, apiHash: $apiHash, botAuthToken: $botAuthToken));
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
        return $this->importBotAuthorizationAsync(flags: $flags, apiId: $apiId, apiHash: $apiHash, botAuthToken: $botAuthToken)->await();
    }

    /**
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return Future<Authorization|AuthorizationSignUpRequired|null>
     * @see https://core.telegram.org/method/auth.checkPassword
     * @api
     */
    public function checkPasswordAsync(AbstractInputCheckPasswordSRP $password): Future
    {
        return $this->client->call(new CheckPasswordRequest(password: $password));
    }

    /**
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return Authorization|AuthorizationSignUpRequired|null
     * @see https://core.telegram.org/method/auth.checkPassword
     * @api
     */
    public function checkPassword(AbstractInputCheckPasswordSRP $password): ?AbstractAuthorization
    {
        return $this->checkPasswordAsync(password: $password)->await();
    }

    /**
     * @return Future<PasswordRecovery|null>
     * @see https://core.telegram.org/method/auth.requestPasswordRecovery
     * @api
     */
    public function requestPasswordRecoveryAsync(): Future
    {
        return $this->client->call(new RequestPasswordRecoveryRequest());
    }

    /**
     * @return PasswordRecovery|null
     * @see https://core.telegram.org/method/auth.requestPasswordRecovery
     * @api
     */
    public function requestPasswordRecovery(): ?PasswordRecovery
    {
        return $this->requestPasswordRecoveryAsync()->await();
    }

    /**
     * @param string $code
     * @param PasswordInputSettings|null $newSettings
     * @return Future<Authorization|AuthorizationSignUpRequired|null>
     * @see https://core.telegram.org/method/auth.recoverPassword
     * @api
     */
    public function recoverPasswordAsync(string $code, ?PasswordInputSettings $newSettings = null): Future
    {
        return $this->client->call(new RecoverPasswordRequest(code: $code, newSettings: $newSettings));
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
        return $this->recoverPasswordAsync(code: $code, newSettings: $newSettings)->await();
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string|null $reason
     * @return Future<SentCode|SentCodeSuccess|SentCodePaymentRequired|null>
     * @see https://core.telegram.org/method/auth.resendCode
     * @api
     */
    public function resendCodeAsync(string $phoneNumber, string $phoneCodeHash, ?string $reason = null): Future
    {
        return $this->client->call(new ResendCodeRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, reason: $reason));
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
        return $this->resendCodeAsync(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, reason: $reason)->await();
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @return Future<bool>
     * @see https://core.telegram.org/method/auth.cancelCode
     * @api
     */
    public function cancelCodeAsync(string $phoneNumber, string $phoneCodeHash): Future
    {
        return $this->client->call(new CancelCodeRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash));
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
        return (bool) $this->cancelCodeAsync(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash)->await();
    }

    /**
     * @param list<int> $exceptAuthKeys
     * @return Future<bool>
     * @see https://core.telegram.org/method/auth.dropTempAuthKeys
     * @api
     */
    public function dropTempAuthKeysAsync(array $exceptAuthKeys): Future
    {
        return $this->client->call(new DropTempAuthKeysRequest(exceptAuthKeys: $exceptAuthKeys));
    }

    /**
     * @param list<int> $exceptAuthKeys
     * @return bool
     * @see https://core.telegram.org/method/auth.dropTempAuthKeys
     * @api
     */
    public function dropTempAuthKeys(array $exceptAuthKeys): bool
    {
        return (bool) $this->dropTempAuthKeysAsync(exceptAuthKeys: $exceptAuthKeys)->await();
    }

    /**
     * @param int $apiId
     * @param string $apiHash
     * @param list<int> $exceptIds
     * @return Future<LoginToken|LoginTokenMigrateTo|LoginTokenSuccess|null>
     * @see https://core.telegram.org/method/auth.exportLoginToken
     * @api
     */
    public function exportLoginTokenAsync(int $apiId, string $apiHash, array $exceptIds): Future
    {
        return $this->client->call(new ExportLoginTokenRequest(apiId: $apiId, apiHash: $apiHash, exceptIds: $exceptIds));
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
        return $this->exportLoginTokenAsync(apiId: $apiId, apiHash: $apiHash, exceptIds: $exceptIds)->await();
    }

    /**
     * @param string $token
     * @return Future<LoginToken|LoginTokenMigrateTo|LoginTokenSuccess|null>
     * @see https://core.telegram.org/method/auth.importLoginToken
     * @api
     */
    public function importLoginTokenAsync(string $token): Future
    {
        return $this->client->call(new ImportLoginTokenRequest(token: $token));
    }

    /**
     * @param string $token
     * @return LoginToken|LoginTokenMigrateTo|LoginTokenSuccess|null
     * @see https://core.telegram.org/method/auth.importLoginToken
     * @api
     */
    public function importLoginToken(string $token): ?AbstractLoginToken
    {
        return $this->importLoginTokenAsync(token: $token)->await();
    }

    /**
     * @param string $token
     * @return Future<BaseAuthorization|null>
     * @see https://core.telegram.org/method/auth.acceptLoginToken
     * @api
     */
    public function acceptLoginTokenAsync(string $token): Future
    {
        return $this->client->call(new AcceptLoginTokenRequest(token: $token));
    }

    /**
     * @param string $token
     * @return BaseAuthorization|null
     * @see https://core.telegram.org/method/auth.acceptLoginToken
     * @api
     */
    public function acceptLoginToken(string $token): ?BaseAuthorization
    {
        return $this->acceptLoginTokenAsync(token: $token)->await();
    }

    /**
     * @param string $code
     * @return Future<bool>
     * @see https://core.telegram.org/method/auth.checkRecoveryPassword
     * @api
     */
    public function checkRecoveryPasswordAsync(string $code): Future
    {
        return $this->client->call(new CheckRecoveryPasswordRequest(code: $code));
    }

    /**
     * @param string $code
     * @return bool
     * @see https://core.telegram.org/method/auth.checkRecoveryPassword
     * @api
     */
    public function checkRecoveryPassword(string $code): bool
    {
        return (bool) $this->checkRecoveryPasswordAsync(code: $code)->await();
    }

    /**
     * @param int $apiId
     * @param string $apiHash
     * @param string $webAuthToken
     * @return Future<Authorization|AuthorizationSignUpRequired|null>
     * @see https://core.telegram.org/method/auth.importWebTokenAuthorization
     * @api
     */
    public function importWebTokenAuthorizationAsync(int $apiId, string $apiHash, string $webAuthToken): Future
    {
        return $this->client->call(new ImportWebTokenAuthorizationRequest(apiId: $apiId, apiHash: $apiHash, webAuthToken: $webAuthToken));
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
        return $this->importWebTokenAuthorizationAsync(apiId: $apiId, apiHash: $apiHash, webAuthToken: $webAuthToken)->await();
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string|null $safetyNetToken
     * @param string|null $playIntegrityToken
     * @param string|null $iosPushSecret
     * @return Future<bool>
     * @see https://core.telegram.org/method/auth.requestFirebaseSms
     * @api
     */
    public function requestFirebaseSmsAsync(string $phoneNumber, string $phoneCodeHash, ?string $safetyNetToken = null, ?string $playIntegrityToken = null, ?string $iosPushSecret = null): Future
    {
        return $this->client->call(new RequestFirebaseSmsRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, safetyNetToken: $safetyNetToken, playIntegrityToken: $playIntegrityToken, iosPushSecret: $iosPushSecret));
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
        return (bool) $this->requestFirebaseSmsAsync(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, safetyNetToken: $safetyNetToken, playIntegrityToken: $playIntegrityToken, iosPushSecret: $iosPushSecret)->await();
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @return Future<SentCode|SentCodeSuccess|SentCodePaymentRequired|null>
     * @see https://core.telegram.org/method/auth.resetLoginEmail
     * @api
     */
    public function resetLoginEmailAsync(string $phoneNumber, string $phoneCodeHash): Future
    {
        return $this->client->call(new ResetLoginEmailRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash));
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
        return $this->resetLoginEmailAsync(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash)->await();
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $mnc
     * @return Future<bool>
     * @see https://core.telegram.org/method/auth.reportMissingCode
     * @api
     */
    public function reportMissingCodeAsync(string $phoneNumber, string $phoneCodeHash, string $mnc): Future
    {
        return $this->client->call(new ReportMissingCodeRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, mnc: $mnc));
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
        return (bool) $this->reportMissingCodeAsync(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, mnc: $mnc)->await();
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param int $formId
     * @return Future<SentCode|SentCodeSuccess|SentCodePaymentRequired|null>
     * @see https://core.telegram.org/method/auth.checkPaidAuth
     * @api
     */
    public function checkPaidAuthAsync(string $phoneNumber, string $phoneCodeHash, int $formId): Future
    {
        return $this->client->call(new CheckPaidAuthRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, formId: $formId));
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param int $formId
     * @return SentCode|SentCodeSuccess|SentCodePaymentRequired|null
     * @see https://core.telegram.org/method/auth.checkPaidAuth
     * @api
     */
    public function checkPaidAuth(string $phoneNumber, string $phoneCodeHash, int $formId): ?AbstractSentCode
    {
        return $this->checkPaidAuthAsync(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, formId: $formId)->await();
    }

    /**
     * @param int $apiId
     * @param string $apiHash
     * @return Future<PasskeyLoginOptions|null>
     * @see https://core.telegram.org/method/auth.initPasskeyLogin
     * @api
     */
    public function initPasskeyLoginAsync(int $apiId, string $apiHash): Future
    {
        return $this->client->call(new InitPasskeyLoginRequest(apiId: $apiId, apiHash: $apiHash));
    }

    /**
     * @param int $apiId
     * @param string $apiHash
     * @return PasskeyLoginOptions|null
     * @see https://core.telegram.org/method/auth.initPasskeyLogin
     * @api
     */
    public function initPasskeyLogin(int $apiId, string $apiHash): ?PasskeyLoginOptions
    {
        return $this->initPasskeyLoginAsync(apiId: $apiId, apiHash: $apiHash)->await();
    }

    /**
     * @param InputPasskeyCredential $credential
     * @param int|null $fromDcId
     * @param int|null $fromAuthKeyId
     * @return Future<Authorization|AuthorizationSignUpRequired|null>
     * @see https://core.telegram.org/method/auth.finishPasskeyLogin
     * @api
     */
    public function finishPasskeyLoginAsync(InputPasskeyCredential $credential, ?int $fromDcId = null, ?int $fromAuthKeyId = null): Future
    {
        return $this->client->call(new FinishPasskeyLoginRequest(credential: $credential, fromDcId: $fromDcId, fromAuthKeyId: $fromAuthKeyId));
    }

    /**
     * @param InputPasskeyCredential $credential
     * @param int|null $fromDcId
     * @param int|null $fromAuthKeyId
     * @return Authorization|AuthorizationSignUpRequired|null
     * @see https://core.telegram.org/method/auth.finishPasskeyLogin
     * @api
     */
    public function finishPasskeyLogin(InputPasskeyCredential $credential, ?int $fromDcId = null, ?int $fromAuthKeyId = null): ?AbstractAuthorization
    {
        return $this->finishPasskeyLoginAsync(credential: $credential, fromDcId: $fromDcId, fromAuthKeyId: $fromAuthKeyId)->await();
    }
}