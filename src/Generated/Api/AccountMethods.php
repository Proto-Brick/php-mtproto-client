<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\AcceptAuthorizationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\CancelPasswordEmailRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ChangeAuthorizationSettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ChangePhoneRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\CheckUsernameRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ClearRecentEmojiStatusesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ConfirmPasswordEmailRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ConfirmPhoneRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\CreateBusinessChatLinkRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\CreateThemeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\DeclinePasswordResetRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\DeleteAccountRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\DeleteAutoSaveExceptionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\DeleteBusinessChatLinkRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\DeletePasskeyRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\DeleteSecureValueRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\DisablePeerConnectedBotRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\EditBusinessChatLinkRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\FinishTakeoutSessionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetAccountTTLRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetAllSecureValuesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetAuthorizationFormRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetAuthorizationsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetAutoDownloadSettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetAutoSaveSettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetBotBusinessConnectionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetBusinessChatLinksRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetChannelDefaultEmojiStatusesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetChannelRestrictedStatusEmojisRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetChatThemesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetCollectibleEmojiStatusesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetConnectedBotsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetContactSignUpNotificationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetContentSettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetDefaultBackgroundEmojisRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetDefaultEmojiStatusesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetDefaultGroupPhotoEmojisRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetDefaultProfilePhotoEmojisRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetGlobalPrivacySettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetMultiWallPapersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetNotifyExceptionsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetNotifySettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetPaidMessagesRevenueRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetPasskeysRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetPasswordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetPasswordSettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetPrivacyRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetReactionsNotifySettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetRecentEmojiStatusesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetSavedMusicIdsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetSavedRingtonesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetSecureValueRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetThemeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetThemesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetTmpPasswordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetUniqueGiftChatThemesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetWallPaperRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetWallPapersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\GetWebAuthorizationsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\InitPasskeyRegistrationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\InitTakeoutSessionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\InstallThemeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\InstallWallPaperRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\InvalidateSignInCodesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\RegisterDeviceRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\RegisterPasskeyRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ReorderUsernamesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ReportPeerRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ReportProfilePhotoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ResendPasswordEmailRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ResetAuthorizationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ResetNotifySettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ResetPasswordRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ResetWallPapersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ResetWebAuthorizationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ResetWebAuthorizationsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ResolveBusinessChatLinkRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SaveAutoDownloadSettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SaveAutoSaveSettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SaveMusicRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SaveRingtoneRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SaveSecureValueRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SaveThemeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SaveWallPaperRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SendChangePhoneCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SendConfirmPhoneCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SendVerifyEmailCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SendVerifyPhoneCodeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SetAccountTTLRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SetAuthorizationTTLRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SetContactSignUpNotificationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SetContentSettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SetGlobalPrivacySettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SetMainProfileTabRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SetPrivacyRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\SetReactionsNotifySettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ToggleConnectedBotPausedRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ToggleNoPaidMessagesExceptionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ToggleSponsoredMessagesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\ToggleUsernameRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UnregisterDeviceRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateBirthdayRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateBusinessAwayMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateBusinessGreetingMessageRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateBusinessIntroRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateBusinessLocationRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateBusinessWorkHoursRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateColorRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateConnectedBotRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateDeviceLockedRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateEmojiStatusRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateNotifySettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdatePasswordSettingsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdatePersonalChannelRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateProfileRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateStatusRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateThemeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UpdateUsernameRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UploadRingtoneRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UploadThemeRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\UploadWallPaperRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\VerifyEmailRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Account\VerifyPhoneRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractChatThemes;
use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractEmailVerified;
use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractEmojiStatuses;
use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractResetPasswordResult;
use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractSavedMusicIds;
use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractSavedRingtone;
use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractSavedRingtones;
use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractThemes;
use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractWallPapers;
use ProtoBrick\MTProtoClient\Generated\Types\Account\AuthorizationForm;
use ProtoBrick\MTProtoClient\Generated\Types\Account\Authorizations;
use ProtoBrick\MTProtoClient\Generated\Types\Account\AutoDownloadSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Account\AutoSaveSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Account\BusinessChatLinks;
use ProtoBrick\MTProtoClient\Generated\Types\Account\ChatThemes;
use ProtoBrick\MTProtoClient\Generated\Types\Account\ChatThemesNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Account\ConnectedBots;
use ProtoBrick\MTProtoClient\Generated\Types\Account\ContentSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Account\EmailVerified;
use ProtoBrick\MTProtoClient\Generated\Types\Account\EmailVerifiedLogin;
use ProtoBrick\MTProtoClient\Generated\Types\Account\EmojiStatuses;
use ProtoBrick\MTProtoClient\Generated\Types\Account\EmojiStatusesNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Account\PaidMessagesRevenue;
use ProtoBrick\MTProtoClient\Generated\Types\Account\PasskeyRegistrationOptions;
use ProtoBrick\MTProtoClient\Generated\Types\Account\Passkeys;
use ProtoBrick\MTProtoClient\Generated\Types\Account\Password;
use ProtoBrick\MTProtoClient\Generated\Types\Account\PasswordInputSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Account\PasswordSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Account\PrivacyRules;
use ProtoBrick\MTProtoClient\Generated\Types\Account\ResetPasswordFailedWait;
use ProtoBrick\MTProtoClient\Generated\Types\Account\ResetPasswordOk;
use ProtoBrick\MTProtoClient\Generated\Types\Account\ResetPasswordRequestedWait;
use ProtoBrick\MTProtoClient\Generated\Types\Account\ResolvedBusinessChatLinks;
use ProtoBrick\MTProtoClient\Generated\Types\Account\SavedMusicIds;
use ProtoBrick\MTProtoClient\Generated\Types\Account\SavedMusicIdsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Account\SavedRingtone;
use ProtoBrick\MTProtoClient\Generated\Types\Account\SavedRingtoneConverted;
use ProtoBrick\MTProtoClient\Generated\Types\Account\SavedRingtones;
use ProtoBrick\MTProtoClient\Generated\Types\Account\SavedRingtonesNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Account\SentEmailCode;
use ProtoBrick\MTProtoClient\Generated\Types\Account\Takeout;
use ProtoBrick\MTProtoClient\Generated\Types\Account\Themes;
use ProtoBrick\MTProtoClient\Generated\Types\Account\ThemesNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Account\TmpPassword;
use ProtoBrick\MTProtoClient\Generated\Types\Account\WallPapers;
use ProtoBrick\MTProtoClient\Generated\Types\Account\WallPapersNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Account\WebAuthorizations;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractSentCode;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\SentCode;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\SentCodePaymentRequired;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\SentCodeSuccess;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmailVerification;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmailVerifyPurpose;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiList;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiStatus;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputNotifyPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPrivacyRule;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputTheme;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputWallPaper;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPeerColor;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractWallPaper;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AccountDaysTTL;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AutoDownloadSettings as BaseAutoDownloadSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AutoSaveSettings as BaseAutoSaveSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BaseTheme;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Birthday;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BusinessBotRights;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BusinessChatLink;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BusinessWorkHours;
use ProtoBrick\MTProtoClient\Generated\Types\Base\CodeSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Document;
use ProtoBrick\MTProtoClient\Generated\Types\Base\DocumentEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmailVerificationApple;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmailVerificationCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmailVerificationGoogle;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmailVerifyPurposeLoginChange;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmailVerifyPurposeLoginSetup;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmailVerifyPurposePassport;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiList;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiListNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiStatus;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiStatusCollectible;
use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiStatusEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\GlobalPrivacySettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBusinessAwayMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBusinessBotRecipients;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBusinessChatLink;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBusinessGreetingMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBusinessIntro;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChannelEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCheckPasswordEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputDocumentEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEmojiStatusCollectible;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFileBig;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFileStoryDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputGeoPoint;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputGeoPointEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputNotifyBroadcasts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputNotifyChats;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputNotifyForumTopic;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputNotifyPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputNotifyUsers;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPasskeyCredential;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerColorCollectible;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerNotifySettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPhotoEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyKey;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowAll;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowBots;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowChatParticipants;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowCloseFriends;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowContacts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowPremium;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueAllowUsers;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueDisallowAll;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueDisallowBots;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueDisallowChatParticipants;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueDisallowContacts;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyValueDisallowUsers;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputSecureValue;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputTheme;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputThemeSettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputThemeSlug;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputWallPaper;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputWallPaperNoFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputWallPaperSlug;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Passkey;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PeerColor;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PeerColorCollectible;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PeerNotifySettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ProfileTab;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReactionsNotifySettings;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReportReason;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureCredentialsEncrypted;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValue;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueHash;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueType;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Theme;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Updates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesTooLong;
use ProtoBrick\MTProtoClient\Generated\Types\Base\User;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WallPaper;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WallPaperNoFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WallPaperSettings;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "account" group.
 */
final readonly class AccountMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param int $tokenType
     * @param string $token
     * @param bool $appSandbox
     * @param string $secret
     * @param list<int> $otherUids
     * @param bool|null $noMuted
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.registerDevice
     * @api
     */
    public function registerDeviceAsync(int $tokenType, string $token, bool $appSandbox, string $secret, array $otherUids, ?bool $noMuted = null): Future
    {
        return $this->client->call(new RegisterDeviceRequest(tokenType: $tokenType, token: $token, appSandbox: $appSandbox, secret: $secret, otherUids: $otherUids, noMuted: $noMuted));
    }

    /**
     * @param int $tokenType
     * @param string $token
     * @param bool $appSandbox
     * @param string $secret
     * @param list<int> $otherUids
     * @param bool|null $noMuted
     * @return bool
     * @see https://core.telegram.org/method/account.registerDevice
     * @api
     */
    public function registerDevice(int $tokenType, string $token, bool $appSandbox, string $secret, array $otherUids, ?bool $noMuted = null): bool
    {
        return (bool) $this->registerDeviceAsync(tokenType: $tokenType, token: $token, appSandbox: $appSandbox, secret: $secret, otherUids: $otherUids, noMuted: $noMuted)->await();
    }

    /**
     * @param int $tokenType
     * @param string $token
     * @param list<int> $otherUids
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.unregisterDevice
     * @api
     */
    public function unregisterDeviceAsync(int $tokenType, string $token, array $otherUids): Future
    {
        return $this->client->call(new UnregisterDeviceRequest(tokenType: $tokenType, token: $token, otherUids: $otherUids));
    }

    /**
     * @param int $tokenType
     * @param string $token
     * @param list<int> $otherUids
     * @return bool
     * @see https://core.telegram.org/method/account.unregisterDevice
     * @api
     */
    public function unregisterDevice(int $tokenType, string $token, array $otherUids): bool
    {
        return (bool) $this->unregisterDeviceAsync(tokenType: $tokenType, token: $token, otherUids: $otherUids)->await();
    }

    /**
     * @param InputNotifyPeer|InputNotifyUsers|InputNotifyChats|InputNotifyBroadcasts|InputNotifyForumTopic $peer
     * @param InputPeerNotifySettings $settings
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updateNotifySettings
     * @api
     */
    public function updateNotifySettingsAsync(AbstractInputNotifyPeer $peer, InputPeerNotifySettings $settings): Future
    {
        return $this->client->call(new UpdateNotifySettingsRequest(peer: $peer, settings: $settings));
    }

    /**
     * @param InputNotifyPeer|InputNotifyUsers|InputNotifyChats|InputNotifyBroadcasts|InputNotifyForumTopic $peer
     * @param InputPeerNotifySettings $settings
     * @return bool
     * @see https://core.telegram.org/method/account.updateNotifySettings
     * @api
     */
    public function updateNotifySettings(AbstractInputNotifyPeer $peer, InputPeerNotifySettings $settings): bool
    {
        return (bool) $this->updateNotifySettingsAsync(peer: $peer, settings: $settings)->await();
    }

    /**
     * @param InputNotifyPeer|InputNotifyUsers|InputNotifyChats|InputNotifyBroadcasts|InputNotifyForumTopic $peer
     * @return Future<PeerNotifySettings|null>
     * @see https://core.telegram.org/method/account.getNotifySettings
     * @api
     */
    public function getNotifySettingsAsync(AbstractInputNotifyPeer $peer): Future
    {
        return $this->client->call(new GetNotifySettingsRequest(peer: $peer));
    }

    /**
     * @param InputNotifyPeer|InputNotifyUsers|InputNotifyChats|InputNotifyBroadcasts|InputNotifyForumTopic $peer
     * @return PeerNotifySettings|null
     * @see https://core.telegram.org/method/account.getNotifySettings
     * @api
     */
    public function getNotifySettings(AbstractInputNotifyPeer $peer): ?PeerNotifySettings
    {
        return $this->getNotifySettingsAsync(peer: $peer)->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.resetNotifySettings
     * @api
     */
    public function resetNotifySettingsAsync(): Future
    {
        return $this->client->call(new ResetNotifySettingsRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.resetNotifySettings
     * @api
     */
    public function resetNotifySettings(): bool
    {
        return (bool) $this->resetNotifySettingsAsync()->await();
    }

    /**
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $about
     * @return Future<UserEmpty|User|null>
     * @see https://core.telegram.org/method/account.updateProfile
     * @api
     */
    public function updateProfileAsync(?string $firstName = null, ?string $lastName = null, ?string $about = null): Future
    {
        return $this->client->call(new UpdateProfileRequest(firstName: $firstName, lastName: $lastName, about: $about));
    }

    /**
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $about
     * @return UserEmpty|User|null
     * @see https://core.telegram.org/method/account.updateProfile
     * @api
     */
    public function updateProfile(?string $firstName = null, ?string $lastName = null, ?string $about = null): ?AbstractUser
    {
        return $this->updateProfileAsync(firstName: $firstName, lastName: $lastName, about: $about)->await();
    }

    /**
     * @param bool $offline
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updateStatus
     * @api
     */
    public function updateStatusAsync(bool $offline): Future
    {
        return $this->client->call(new UpdateStatusRequest(offline: $offline));
    }

    /**
     * @param bool $offline
     * @return bool
     * @see https://core.telegram.org/method/account.updateStatus
     * @api
     */
    public function updateStatus(bool $offline): bool
    {
        return (bool) $this->updateStatusAsync(offline: $offline)->await();
    }

    /**
     * @param int $hash
     * @return Future<WallPapersNotModified|WallPapers|null>
     * @see https://core.telegram.org/method/account.getWallPapers
     * @api
     */
    public function getWallPapersAsync(int $hash): Future
    {
        return $this->client->call(new GetWallPapersRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return WallPapersNotModified|WallPapers|null
     * @see https://core.telegram.org/method/account.getWallPapers
     * @api
     */
    public function getWallPapers(int $hash): ?AbstractWallPapers
    {
        return $this->getWallPapersAsync(hash: $hash)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param ReportReason $reason
     * @param string $message
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.reportPeer
     * @api
     */
    public function reportPeerAsync(AbstractInputPeer|string|int $peer, ReportReason $reason, string $message): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ReportPeerRequest(peer: $peer, reason: $reason, message: $message));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param ReportReason $reason
     * @param string $message
     * @return bool
     * @see https://core.telegram.org/method/account.reportPeer
     * @api
     */
    public function reportPeer(AbstractInputPeer|string|int $peer, ReportReason $reason, string $message): bool
    {
        return (bool) $this->reportPeerAsync(peer: $peer, reason: $reason, message: $message)->await();
    }

    /**
     * @param string $username
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.checkUsername
     * @api
     */
    public function checkUsernameAsync(string $username): Future
    {
        return $this->client->call(new CheckUsernameRequest(username: $username));
    }

    /**
     * @param string $username
     * @return bool
     * @see https://core.telegram.org/method/account.checkUsername
     * @api
     */
    public function checkUsername(string $username): bool
    {
        return (bool) $this->checkUsernameAsync(username: $username)->await();
    }

    /**
     * @param string $username
     * @return Future<UserEmpty|User|null>
     * @see https://core.telegram.org/method/account.updateUsername
     * @api
     */
    public function updateUsernameAsync(string $username): Future
    {
        return $this->client->call(new UpdateUsernameRequest(username: $username));
    }

    /**
     * @param string $username
     * @return UserEmpty|User|null
     * @see https://core.telegram.org/method/account.updateUsername
     * @api
     */
    public function updateUsername(string $username): ?AbstractUser
    {
        return $this->updateUsernameAsync(username: $username)->await();
    }

    /**
     * @param InputPrivacyKey $key
     * @return Future<PrivacyRules|null>
     * @see https://core.telegram.org/method/account.getPrivacy
     * @api
     */
    public function getPrivacyAsync(InputPrivacyKey $key): Future
    {
        return $this->client->call(new GetPrivacyRequest(key: $key));
    }

    /**
     * @param InputPrivacyKey $key
     * @return PrivacyRules|null
     * @see https://core.telegram.org/method/account.getPrivacy
     * @api
     */
    public function getPrivacy(InputPrivacyKey $key): ?PrivacyRules
    {
        return $this->getPrivacyAsync(key: $key)->await();
    }

    /**
     * @param InputPrivacyKey $key
     * @param list<InputPrivacyValueAllowContacts|InputPrivacyValueAllowAll|InputPrivacyValueAllowUsers|InputPrivacyValueDisallowContacts|InputPrivacyValueDisallowAll|InputPrivacyValueDisallowUsers|InputPrivacyValueAllowChatParticipants|InputPrivacyValueDisallowChatParticipants|InputPrivacyValueAllowCloseFriends|InputPrivacyValueAllowPremium|InputPrivacyValueAllowBots|InputPrivacyValueDisallowBots> $rules
     * @return Future<PrivacyRules|null>
     * @see https://core.telegram.org/method/account.setPrivacy
     * @api
     */
    public function setPrivacyAsync(InputPrivacyKey $key, array $rules): Future
    {
        return $this->client->call(new SetPrivacyRequest(key: $key, rules: $rules));
    }

    /**
     * @param InputPrivacyKey $key
     * @param list<InputPrivacyValueAllowContacts|InputPrivacyValueAllowAll|InputPrivacyValueAllowUsers|InputPrivacyValueDisallowContacts|InputPrivacyValueDisallowAll|InputPrivacyValueDisallowUsers|InputPrivacyValueAllowChatParticipants|InputPrivacyValueDisallowChatParticipants|InputPrivacyValueAllowCloseFriends|InputPrivacyValueAllowPremium|InputPrivacyValueAllowBots|InputPrivacyValueDisallowBots> $rules
     * @return PrivacyRules|null
     * @see https://core.telegram.org/method/account.setPrivacy
     * @api
     */
    public function setPrivacy(InputPrivacyKey $key, array $rules): ?PrivacyRules
    {
        return $this->setPrivacyAsync(key: $key, rules: $rules)->await();
    }

    /**
     * @param string $reason
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP|null $password
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.deleteAccount
     * @api
     */
    public function deleteAccountAsync(string $reason, ?AbstractInputCheckPasswordSRP $password = null): Future
    {
        return $this->client->call(new DeleteAccountRequest(reason: $reason, password: $password));
    }

    /**
     * @param string $reason
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP|null $password
     * @return bool
     * @see https://core.telegram.org/method/account.deleteAccount
     * @api
     */
    public function deleteAccount(string $reason, ?AbstractInputCheckPasswordSRP $password = null): bool
    {
        return (bool) $this->deleteAccountAsync(reason: $reason, password: $password)->await();
    }

    /**
     * @return Future<AccountDaysTTL|null>
     * @see https://core.telegram.org/method/account.getAccountTTL
     * @api
     */
    public function getAccountTTLAsync(): Future
    {
        return $this->client->call(new GetAccountTTLRequest());
    }

    /**
     * @return AccountDaysTTL|null
     * @see https://core.telegram.org/method/account.getAccountTTL
     * @api
     */
    public function getAccountTTL(): ?AccountDaysTTL
    {
        return $this->getAccountTTLAsync()->await();
    }

    /**
     * @param AccountDaysTTL $ttl
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.setAccountTTL
     * @api
     */
    public function setAccountTTLAsync(AccountDaysTTL $ttl): Future
    {
        return $this->client->call(new SetAccountTTLRequest(ttl: $ttl));
    }

    /**
     * @param AccountDaysTTL $ttl
     * @return bool
     * @see https://core.telegram.org/method/account.setAccountTTL
     * @api
     */
    public function setAccountTTL(AccountDaysTTL $ttl): bool
    {
        return (bool) $this->setAccountTTLAsync(ttl: $ttl)->await();
    }

    /**
     * @param string $phoneNumber
     * @param CodeSettings $settings
     * @return Future<SentCode|SentCodeSuccess|SentCodePaymentRequired|null>
     * @see https://core.telegram.org/method/account.sendChangePhoneCode
     * @api
     */
    public function sendChangePhoneCodeAsync(string $phoneNumber, CodeSettings $settings): Future
    {
        return $this->client->call(new SendChangePhoneCodeRequest(phoneNumber: $phoneNumber, settings: $settings));
    }

    /**
     * @param string $phoneNumber
     * @param CodeSettings $settings
     * @return SentCode|SentCodeSuccess|SentCodePaymentRequired|null
     * @see https://core.telegram.org/method/account.sendChangePhoneCode
     * @api
     */
    public function sendChangePhoneCode(string $phoneNumber, CodeSettings $settings): ?AbstractSentCode
    {
        return $this->sendChangePhoneCodeAsync(phoneNumber: $phoneNumber, settings: $settings)->await();
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $phoneCode
     * @return Future<UserEmpty|User|null>
     * @see https://core.telegram.org/method/account.changePhone
     * @api
     */
    public function changePhoneAsync(string $phoneNumber, string $phoneCodeHash, string $phoneCode): Future
    {
        return $this->client->call(new ChangePhoneRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, phoneCode: $phoneCode));
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $phoneCode
     * @return UserEmpty|User|null
     * @see https://core.telegram.org/method/account.changePhone
     * @api
     */
    public function changePhone(string $phoneNumber, string $phoneCodeHash, string $phoneCode): ?AbstractUser
    {
        return $this->changePhoneAsync(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, phoneCode: $phoneCode)->await();
    }

    /**
     * @param int $period
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updateDeviceLocked
     * @api
     */
    public function updateDeviceLockedAsync(int $period): Future
    {
        return $this->client->call(new UpdateDeviceLockedRequest(period: $period));
    }

    /**
     * @param int $period
     * @return bool
     * @see https://core.telegram.org/method/account.updateDeviceLocked
     * @api
     */
    public function updateDeviceLocked(int $period): bool
    {
        return (bool) $this->updateDeviceLockedAsync(period: $period)->await();
    }

    /**
     * @return Future<Authorizations|null>
     * @see https://core.telegram.org/method/account.getAuthorizations
     * @api
     */
    public function getAuthorizationsAsync(): Future
    {
        return $this->client->call(new GetAuthorizationsRequest());
    }

    /**
     * @return Authorizations|null
     * @see https://core.telegram.org/method/account.getAuthorizations
     * @api
     */
    public function getAuthorizations(): ?Authorizations
    {
        return $this->getAuthorizationsAsync()->await();
    }

    /**
     * @param int $hash
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.resetAuthorization
     * @api
     */
    public function resetAuthorizationAsync(int $hash): Future
    {
        return $this->client->call(new ResetAuthorizationRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return bool
     * @see https://core.telegram.org/method/account.resetAuthorization
     * @api
     */
    public function resetAuthorization(int $hash): bool
    {
        return (bool) $this->resetAuthorizationAsync(hash: $hash)->await();
    }

    /**
     * @return Future<Password|null>
     * @see https://core.telegram.org/method/account.getPassword
     * @api
     */
    public function getPasswordAsync(): Future
    {
        return $this->client->call(new GetPasswordRequest());
    }

    /**
     * @return Password|null
     * @see https://core.telegram.org/method/account.getPassword
     * @api
     */
    public function getPassword(): ?Password
    {
        return $this->getPasswordAsync()->await();
    }

    /**
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return Future<PasswordSettings|null>
     * @see https://core.telegram.org/method/account.getPasswordSettings
     * @api
     */
    public function getPasswordSettingsAsync(AbstractInputCheckPasswordSRP $password): Future
    {
        return $this->client->call(new GetPasswordSettingsRequest(password: $password));
    }

    /**
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return PasswordSettings|null
     * @see https://core.telegram.org/method/account.getPasswordSettings
     * @api
     */
    public function getPasswordSettings(AbstractInputCheckPasswordSRP $password): ?PasswordSettings
    {
        return $this->getPasswordSettingsAsync(password: $password)->await();
    }

    /**
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @param PasswordInputSettings $newSettings
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updatePasswordSettings
     * @api
     */
    public function updatePasswordSettingsAsync(AbstractInputCheckPasswordSRP $password, PasswordInputSettings $newSettings): Future
    {
        return $this->client->call(new UpdatePasswordSettingsRequest(password: $password, newSettings: $newSettings));
    }

    /**
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @param PasswordInputSettings $newSettings
     * @return bool
     * @see https://core.telegram.org/method/account.updatePasswordSettings
     * @api
     */
    public function updatePasswordSettings(AbstractInputCheckPasswordSRP $password, PasswordInputSettings $newSettings): bool
    {
        return (bool) $this->updatePasswordSettingsAsync(password: $password, newSettings: $newSettings)->await();
    }

    /**
     * @param string $hash
     * @param CodeSettings $settings
     * @return Future<SentCode|SentCodeSuccess|SentCodePaymentRequired|null>
     * @see https://core.telegram.org/method/account.sendConfirmPhoneCode
     * @api
     */
    public function sendConfirmPhoneCodeAsync(string $hash, CodeSettings $settings): Future
    {
        return $this->client->call(new SendConfirmPhoneCodeRequest(hash: $hash, settings: $settings));
    }

    /**
     * @param string $hash
     * @param CodeSettings $settings
     * @return SentCode|SentCodeSuccess|SentCodePaymentRequired|null
     * @see https://core.telegram.org/method/account.sendConfirmPhoneCode
     * @api
     */
    public function sendConfirmPhoneCode(string $hash, CodeSettings $settings): ?AbstractSentCode
    {
        return $this->sendConfirmPhoneCodeAsync(hash: $hash, settings: $settings)->await();
    }

    /**
     * @param string $phoneCodeHash
     * @param string $phoneCode
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.confirmPhone
     * @api
     */
    public function confirmPhoneAsync(string $phoneCodeHash, string $phoneCode): Future
    {
        return $this->client->call(new ConfirmPhoneRequest(phoneCodeHash: $phoneCodeHash, phoneCode: $phoneCode));
    }

    /**
     * @param string $phoneCodeHash
     * @param string $phoneCode
     * @return bool
     * @see https://core.telegram.org/method/account.confirmPhone
     * @api
     */
    public function confirmPhone(string $phoneCodeHash, string $phoneCode): bool
    {
        return (bool) $this->confirmPhoneAsync(phoneCodeHash: $phoneCodeHash, phoneCode: $phoneCode)->await();
    }

    /**
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @param int $period
     * @return Future<TmpPassword|null>
     * @see https://core.telegram.org/method/account.getTmpPassword
     * @api
     */
    public function getTmpPasswordAsync(AbstractInputCheckPasswordSRP $password, int $period): Future
    {
        return $this->client->call(new GetTmpPasswordRequest(password: $password, period: $period));
    }

    /**
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @param int $period
     * @return TmpPassword|null
     * @see https://core.telegram.org/method/account.getTmpPassword
     * @api
     */
    public function getTmpPassword(AbstractInputCheckPasswordSRP $password, int $period): ?TmpPassword
    {
        return $this->getTmpPasswordAsync(password: $password, period: $period)->await();
    }

    /**
     * @return Future<WebAuthorizations|null>
     * @see https://core.telegram.org/method/account.getWebAuthorizations
     * @api
     */
    public function getWebAuthorizationsAsync(): Future
    {
        return $this->client->call(new GetWebAuthorizationsRequest());
    }

    /**
     * @return WebAuthorizations|null
     * @see https://core.telegram.org/method/account.getWebAuthorizations
     * @api
     */
    public function getWebAuthorizations(): ?WebAuthorizations
    {
        return $this->getWebAuthorizationsAsync()->await();
    }

    /**
     * @param int $hash
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.resetWebAuthorization
     * @api
     */
    public function resetWebAuthorizationAsync(int $hash): Future
    {
        return $this->client->call(new ResetWebAuthorizationRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return bool
     * @see https://core.telegram.org/method/account.resetWebAuthorization
     * @api
     */
    public function resetWebAuthorization(int $hash): bool
    {
        return (bool) $this->resetWebAuthorizationAsync(hash: $hash)->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.resetWebAuthorizations
     * @api
     */
    public function resetWebAuthorizationsAsync(): Future
    {
        return $this->client->call(new ResetWebAuthorizationsRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.resetWebAuthorizations
     * @api
     */
    public function resetWebAuthorizations(): bool
    {
        return (bool) $this->resetWebAuthorizationsAsync()->await();
    }

    /**
     * @return Future<list<SecureValue>>
     * @see https://core.telegram.org/method/account.getAllSecureValues
     * @api
     */
    public function getAllSecureValuesAsync(): Future
    {
        return $this->client->call(new GetAllSecureValuesRequest());
    }

    /**
     * @return list<SecureValue>
     * @see https://core.telegram.org/method/account.getAllSecureValues
     * @api
     */
    public function getAllSecureValues(): array
    {
        return $this->getAllSecureValuesAsync()->await();
    }

    /**
     * @param list<SecureValueType> $types
     * @return Future<list<SecureValue>>
     * @see https://core.telegram.org/method/account.getSecureValue
     * @api
     */
    public function getSecureValueAsync(array $types): Future
    {
        return $this->client->call(new GetSecureValueRequest(types: $types));
    }

    /**
     * @param list<SecureValueType> $types
     * @return list<SecureValue>
     * @see https://core.telegram.org/method/account.getSecureValue
     * @api
     */
    public function getSecureValue(array $types): array
    {
        return $this->getSecureValueAsync(types: $types)->await();
    }

    /**
     * @param InputSecureValue $value
     * @param int $secureSecretId
     * @return Future<SecureValue|null>
     * @see https://core.telegram.org/method/account.saveSecureValue
     * @api
     */
    public function saveSecureValueAsync(InputSecureValue $value, int $secureSecretId): Future
    {
        return $this->client->call(new SaveSecureValueRequest(value: $value, secureSecretId: $secureSecretId));
    }

    /**
     * @param InputSecureValue $value
     * @param int $secureSecretId
     * @return SecureValue|null
     * @see https://core.telegram.org/method/account.saveSecureValue
     * @api
     */
    public function saveSecureValue(InputSecureValue $value, int $secureSecretId): ?SecureValue
    {
        return $this->saveSecureValueAsync(value: $value, secureSecretId: $secureSecretId)->await();
    }

    /**
     * @param list<SecureValueType> $types
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.deleteSecureValue
     * @api
     */
    public function deleteSecureValueAsync(array $types): Future
    {
        return $this->client->call(new DeleteSecureValueRequest(types: $types));
    }

    /**
     * @param list<SecureValueType> $types
     * @return bool
     * @see https://core.telegram.org/method/account.deleteSecureValue
     * @api
     */
    public function deleteSecureValue(array $types): bool
    {
        return (bool) $this->deleteSecureValueAsync(types: $types)->await();
    }

    /**
     * @param int $botId
     * @param string $scope
     * @param string $publicKey
     * @return Future<AuthorizationForm|null>
     * @see https://core.telegram.org/method/account.getAuthorizationForm
     * @api
     */
    public function getAuthorizationFormAsync(int $botId, string $scope, string $publicKey): Future
    {
        return $this->client->call(new GetAuthorizationFormRequest(botId: $botId, scope: $scope, publicKey: $publicKey));
    }

    /**
     * @param int $botId
     * @param string $scope
     * @param string $publicKey
     * @return AuthorizationForm|null
     * @see https://core.telegram.org/method/account.getAuthorizationForm
     * @api
     */
    public function getAuthorizationForm(int $botId, string $scope, string $publicKey): ?AuthorizationForm
    {
        return $this->getAuthorizationFormAsync(botId: $botId, scope: $scope, publicKey: $publicKey)->await();
    }

    /**
     * @param int $botId
     * @param string $scope
     * @param string $publicKey
     * @param list<SecureValueHash> $valueHashes
     * @param SecureCredentialsEncrypted $credentials
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.acceptAuthorization
     * @api
     */
    public function acceptAuthorizationAsync(int $botId, string $scope, string $publicKey, array $valueHashes, SecureCredentialsEncrypted $credentials): Future
    {
        return $this->client->call(new AcceptAuthorizationRequest(botId: $botId, scope: $scope, publicKey: $publicKey, valueHashes: $valueHashes, credentials: $credentials));
    }

    /**
     * @param int $botId
     * @param string $scope
     * @param string $publicKey
     * @param list<SecureValueHash> $valueHashes
     * @param SecureCredentialsEncrypted $credentials
     * @return bool
     * @see https://core.telegram.org/method/account.acceptAuthorization
     * @api
     */
    public function acceptAuthorization(int $botId, string $scope, string $publicKey, array $valueHashes, SecureCredentialsEncrypted $credentials): bool
    {
        return (bool) $this->acceptAuthorizationAsync(botId: $botId, scope: $scope, publicKey: $publicKey, valueHashes: $valueHashes, credentials: $credentials)->await();
    }

    /**
     * @param string $phoneNumber
     * @param CodeSettings $settings
     * @return Future<SentCode|SentCodeSuccess|SentCodePaymentRequired|null>
     * @see https://core.telegram.org/method/account.sendVerifyPhoneCode
     * @api
     */
    public function sendVerifyPhoneCodeAsync(string $phoneNumber, CodeSettings $settings): Future
    {
        return $this->client->call(new SendVerifyPhoneCodeRequest(phoneNumber: $phoneNumber, settings: $settings));
    }

    /**
     * @param string $phoneNumber
     * @param CodeSettings $settings
     * @return SentCode|SentCodeSuccess|SentCodePaymentRequired|null
     * @see https://core.telegram.org/method/account.sendVerifyPhoneCode
     * @api
     */
    public function sendVerifyPhoneCode(string $phoneNumber, CodeSettings $settings): ?AbstractSentCode
    {
        return $this->sendVerifyPhoneCodeAsync(phoneNumber: $phoneNumber, settings: $settings)->await();
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $phoneCode
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.verifyPhone
     * @api
     */
    public function verifyPhoneAsync(string $phoneNumber, string $phoneCodeHash, string $phoneCode): Future
    {
        return $this->client->call(new VerifyPhoneRequest(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, phoneCode: $phoneCode));
    }

    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $phoneCode
     * @return bool
     * @see https://core.telegram.org/method/account.verifyPhone
     * @api
     */
    public function verifyPhone(string $phoneNumber, string $phoneCodeHash, string $phoneCode): bool
    {
        return (bool) $this->verifyPhoneAsync(phoneNumber: $phoneNumber, phoneCodeHash: $phoneCodeHash, phoneCode: $phoneCode)->await();
    }

    /**
     * @param EmailVerifyPurposeLoginSetup|EmailVerifyPurposeLoginChange|EmailVerifyPurposePassport $purpose
     * @param string $email
     * @return Future<SentEmailCode|null>
     * @see https://core.telegram.org/method/account.sendVerifyEmailCode
     * @api
     */
    public function sendVerifyEmailCodeAsync(AbstractEmailVerifyPurpose $purpose, string $email): Future
    {
        return $this->client->call(new SendVerifyEmailCodeRequest(purpose: $purpose, email: $email));
    }

    /**
     * @param EmailVerifyPurposeLoginSetup|EmailVerifyPurposeLoginChange|EmailVerifyPurposePassport $purpose
     * @param string $email
     * @return SentEmailCode|null
     * @see https://core.telegram.org/method/account.sendVerifyEmailCode
     * @api
     */
    public function sendVerifyEmailCode(AbstractEmailVerifyPurpose $purpose, string $email): ?SentEmailCode
    {
        return $this->sendVerifyEmailCodeAsync(purpose: $purpose, email: $email)->await();
    }

    /**
     * @param EmailVerifyPurposeLoginSetup|EmailVerifyPurposeLoginChange|EmailVerifyPurposePassport $purpose
     * @param EmailVerificationCode|EmailVerificationGoogle|EmailVerificationApple $verification
     * @return Future<EmailVerified|EmailVerifiedLogin|null>
     * @see https://core.telegram.org/method/account.verifyEmail
     * @api
     */
    public function verifyEmailAsync(AbstractEmailVerifyPurpose $purpose, AbstractEmailVerification $verification): Future
    {
        return $this->client->call(new VerifyEmailRequest(purpose: $purpose, verification: $verification));
    }

    /**
     * @param EmailVerifyPurposeLoginSetup|EmailVerifyPurposeLoginChange|EmailVerifyPurposePassport $purpose
     * @param EmailVerificationCode|EmailVerificationGoogle|EmailVerificationApple $verification
     * @return EmailVerified|EmailVerifiedLogin|null
     * @see https://core.telegram.org/method/account.verifyEmail
     * @api
     */
    public function verifyEmail(AbstractEmailVerifyPurpose $purpose, AbstractEmailVerification $verification): ?AbstractEmailVerified
    {
        return $this->verifyEmailAsync(purpose: $purpose, verification: $verification)->await();
    }

    /**
     * @param bool|null $contacts
     * @param bool|null $messageUsers
     * @param bool|null $messageChats
     * @param bool|null $messageMegagroups
     * @param bool|null $messageChannels
     * @param bool|null $files
     * @param int|null $fileMaxSize
     * @return Future<Takeout|null>
     * @see https://core.telegram.org/method/account.initTakeoutSession
     * @api
     */
    public function initTakeoutSessionAsync(?bool $contacts = null, ?bool $messageUsers = null, ?bool $messageChats = null, ?bool $messageMegagroups = null, ?bool $messageChannels = null, ?bool $files = null, ?int $fileMaxSize = null): Future
    {
        return $this->client->call(new InitTakeoutSessionRequest(contacts: $contacts, messageUsers: $messageUsers, messageChats: $messageChats, messageMegagroups: $messageMegagroups, messageChannels: $messageChannels, files: $files, fileMaxSize: $fileMaxSize));
    }

    /**
     * @param bool|null $contacts
     * @param bool|null $messageUsers
     * @param bool|null $messageChats
     * @param bool|null $messageMegagroups
     * @param bool|null $messageChannels
     * @param bool|null $files
     * @param int|null $fileMaxSize
     * @return Takeout|null
     * @see https://core.telegram.org/method/account.initTakeoutSession
     * @api
     */
    public function initTakeoutSession(?bool $contacts = null, ?bool $messageUsers = null, ?bool $messageChats = null, ?bool $messageMegagroups = null, ?bool $messageChannels = null, ?bool $files = null, ?int $fileMaxSize = null): ?Takeout
    {
        return $this->initTakeoutSessionAsync(contacts: $contacts, messageUsers: $messageUsers, messageChats: $messageChats, messageMegagroups: $messageMegagroups, messageChannels: $messageChannels, files: $files, fileMaxSize: $fileMaxSize)->await();
    }

    /**
     * @param bool|null $success
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.finishTakeoutSession
     * @api
     */
    public function finishTakeoutSessionAsync(?bool $success = null): Future
    {
        return $this->client->call(new FinishTakeoutSessionRequest(success: $success));
    }

    /**
     * @param bool|null $success
     * @return bool
     * @see https://core.telegram.org/method/account.finishTakeoutSession
     * @api
     */
    public function finishTakeoutSession(?bool $success = null): bool
    {
        return (bool) $this->finishTakeoutSessionAsync(success: $success)->await();
    }

    /**
     * @param string $code
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.confirmPasswordEmail
     * @api
     */
    public function confirmPasswordEmailAsync(string $code): Future
    {
        return $this->client->call(new ConfirmPasswordEmailRequest(code: $code));
    }

    /**
     * @param string $code
     * @return bool
     * @see https://core.telegram.org/method/account.confirmPasswordEmail
     * @api
     */
    public function confirmPasswordEmail(string $code): bool
    {
        return (bool) $this->confirmPasswordEmailAsync(code: $code)->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.resendPasswordEmail
     * @api
     */
    public function resendPasswordEmailAsync(): Future
    {
        return $this->client->call(new ResendPasswordEmailRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.resendPasswordEmail
     * @api
     */
    public function resendPasswordEmail(): bool
    {
        return (bool) $this->resendPasswordEmailAsync()->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.cancelPasswordEmail
     * @api
     */
    public function cancelPasswordEmailAsync(): Future
    {
        return $this->client->call(new CancelPasswordEmailRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.cancelPasswordEmail
     * @api
     */
    public function cancelPasswordEmail(): bool
    {
        return (bool) $this->cancelPasswordEmailAsync()->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.getContactSignUpNotification
     * @api
     */
    public function getContactSignUpNotificationAsync(): Future
    {
        return $this->client->call(new GetContactSignUpNotificationRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.getContactSignUpNotification
     * @api
     */
    public function getContactSignUpNotification(): bool
    {
        return (bool) $this->getContactSignUpNotificationAsync()->await();
    }

    /**
     * @param bool $silent
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.setContactSignUpNotification
     * @api
     */
    public function setContactSignUpNotificationAsync(bool $silent): Future
    {
        return $this->client->call(new SetContactSignUpNotificationRequest(silent: $silent));
    }

    /**
     * @param bool $silent
     * @return bool
     * @see https://core.telegram.org/method/account.setContactSignUpNotification
     * @api
     */
    public function setContactSignUpNotification(bool $silent): bool
    {
        return (bool) $this->setContactSignUpNotificationAsync(silent: $silent)->await();
    }

    /**
     * @param bool|null $compareSound
     * @param bool|null $compareStories
     * @param InputNotifyPeer|InputNotifyUsers|InputNotifyChats|InputNotifyBroadcasts|InputNotifyForumTopic|null $peer
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/account.getNotifyExceptions
     * @api
     */
    public function getNotifyExceptionsAsync(?bool $compareSound = null, ?bool $compareStories = null, ?AbstractInputNotifyPeer $peer = null): Future
    {
        return $this->client->call(new GetNotifyExceptionsRequest(compareSound: $compareSound, compareStories: $compareStories, peer: $peer));
    }

    /**
     * @param bool|null $compareSound
     * @param bool|null $compareStories
     * @param InputNotifyPeer|InputNotifyUsers|InputNotifyChats|InputNotifyBroadcasts|InputNotifyForumTopic|null $peer
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/account.getNotifyExceptions
     * @api
     */
    public function getNotifyExceptions(?bool $compareSound = null, ?bool $compareStories = null, ?AbstractInputNotifyPeer $peer = null): ?AbstractUpdates
    {
        return $this->getNotifyExceptionsAsync(compareSound: $compareSound, compareStories: $compareStories, peer: $peer)->await();
    }

    /**
     * @param InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile $wallpaper
     * @return Future<WallPaper|WallPaperNoFile|null>
     * @see https://core.telegram.org/method/account.getWallPaper
     * @api
     */
    public function getWallPaperAsync(AbstractInputWallPaper $wallpaper): Future
    {
        return $this->client->call(new GetWallPaperRequest(wallpaper: $wallpaper));
    }

    /**
     * @param InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile $wallpaper
     * @return WallPaper|WallPaperNoFile|null
     * @see https://core.telegram.org/method/account.getWallPaper
     * @api
     */
    public function getWallPaper(AbstractInputWallPaper $wallpaper): ?AbstractWallPaper
    {
        return $this->getWallPaperAsync(wallpaper: $wallpaper)->await();
    }

    /**
     * @param InputFile|InputFileBig|InputFileStoryDocument $file
     * @param string $mimeType
     * @param WallPaperSettings $settings
     * @param bool|null $forChat
     * @return Future<WallPaper|WallPaperNoFile|null>
     * @see https://core.telegram.org/method/account.uploadWallPaper
     * @api
     */
    public function uploadWallPaperAsync(AbstractInputFile $file, string $mimeType, WallPaperSettings $settings, ?bool $forChat = null): Future
    {
        return $this->client->call(new UploadWallPaperRequest(file: $file, mimeType: $mimeType, settings: $settings, forChat: $forChat));
    }

    /**
     * @param InputFile|InputFileBig|InputFileStoryDocument $file
     * @param string $mimeType
     * @param WallPaperSettings $settings
     * @param bool|null $forChat
     * @return WallPaper|WallPaperNoFile|null
     * @see https://core.telegram.org/method/account.uploadWallPaper
     * @api
     */
    public function uploadWallPaper(AbstractInputFile $file, string $mimeType, WallPaperSettings $settings, ?bool $forChat = null): ?AbstractWallPaper
    {
        return $this->uploadWallPaperAsync(file: $file, mimeType: $mimeType, settings: $settings, forChat: $forChat)->await();
    }

    /**
     * @param InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile $wallpaper
     * @param bool $unsave
     * @param WallPaperSettings $settings
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.saveWallPaper
     * @api
     */
    public function saveWallPaperAsync(AbstractInputWallPaper $wallpaper, bool $unsave, WallPaperSettings $settings): Future
    {
        return $this->client->call(new SaveWallPaperRequest(wallpaper: $wallpaper, unsave: $unsave, settings: $settings));
    }

    /**
     * @param InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile $wallpaper
     * @param bool $unsave
     * @param WallPaperSettings $settings
     * @return bool
     * @see https://core.telegram.org/method/account.saveWallPaper
     * @api
     */
    public function saveWallPaper(AbstractInputWallPaper $wallpaper, bool $unsave, WallPaperSettings $settings): bool
    {
        return (bool) $this->saveWallPaperAsync(wallpaper: $wallpaper, unsave: $unsave, settings: $settings)->await();
    }

    /**
     * @param InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile $wallpaper
     * @param WallPaperSettings $settings
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.installWallPaper
     * @api
     */
    public function installWallPaperAsync(AbstractInputWallPaper $wallpaper, WallPaperSettings $settings): Future
    {
        return $this->client->call(new InstallWallPaperRequest(wallpaper: $wallpaper, settings: $settings));
    }

    /**
     * @param InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile $wallpaper
     * @param WallPaperSettings $settings
     * @return bool
     * @see https://core.telegram.org/method/account.installWallPaper
     * @api
     */
    public function installWallPaper(AbstractInputWallPaper $wallpaper, WallPaperSettings $settings): bool
    {
        return (bool) $this->installWallPaperAsync(wallpaper: $wallpaper, settings: $settings)->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.resetWallPapers
     * @api
     */
    public function resetWallPapersAsync(): Future
    {
        return $this->client->call(new ResetWallPapersRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.resetWallPapers
     * @api
     */
    public function resetWallPapers(): bool
    {
        return (bool) $this->resetWallPapersAsync()->await();
    }

    /**
     * @return Future<AutoDownloadSettings|null>
     * @see https://core.telegram.org/method/account.getAutoDownloadSettings
     * @api
     */
    public function getAutoDownloadSettingsAsync(): Future
    {
        return $this->client->call(new GetAutoDownloadSettingsRequest());
    }

    /**
     * @return AutoDownloadSettings|null
     * @see https://core.telegram.org/method/account.getAutoDownloadSettings
     * @api
     */
    public function getAutoDownloadSettings(): ?AutoDownloadSettings
    {
        return $this->getAutoDownloadSettingsAsync()->await();
    }

    /**
     * @param BaseAutoDownloadSettings $settings
     * @param bool|null $low
     * @param bool|null $high
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.saveAutoDownloadSettings
     * @api
     */
    public function saveAutoDownloadSettingsAsync(BaseAutoDownloadSettings $settings, ?bool $low = null, ?bool $high = null): Future
    {
        return $this->client->call(new SaveAutoDownloadSettingsRequest(settings: $settings, low: $low, high: $high));
    }

    /**
     * @param BaseAutoDownloadSettings $settings
     * @param bool|null $low
     * @param bool|null $high
     * @return bool
     * @see https://core.telegram.org/method/account.saveAutoDownloadSettings
     * @api
     */
    public function saveAutoDownloadSettings(BaseAutoDownloadSettings $settings, ?bool $low = null, ?bool $high = null): bool
    {
        return (bool) $this->saveAutoDownloadSettingsAsync(settings: $settings, low: $low, high: $high)->await();
    }

    /**
     * @param InputFile|InputFileBig|InputFileStoryDocument $file
     * @param string $fileName
     * @param string $mimeType
     * @param InputFile|InputFileBig|InputFileStoryDocument|null $thumb
     * @return Future<DocumentEmpty|Document|null>
     * @see https://core.telegram.org/method/account.uploadTheme
     * @api
     */
    public function uploadThemeAsync(AbstractInputFile $file, string $fileName, string $mimeType, ?AbstractInputFile $thumb = null): Future
    {
        return $this->client->call(new UploadThemeRequest(file: $file, fileName: $fileName, mimeType: $mimeType, thumb: $thumb));
    }

    /**
     * @param InputFile|InputFileBig|InputFileStoryDocument $file
     * @param string $fileName
     * @param string $mimeType
     * @param InputFile|InputFileBig|InputFileStoryDocument|null $thumb
     * @return DocumentEmpty|Document|null
     * @see https://core.telegram.org/method/account.uploadTheme
     * @api
     */
    public function uploadTheme(AbstractInputFile $file, string $fileName, string $mimeType, ?AbstractInputFile $thumb = null): ?AbstractDocument
    {
        return $this->uploadThemeAsync(file: $file, fileName: $fileName, mimeType: $mimeType, thumb: $thumb)->await();
    }

    /**
     * @param string $slug
     * @param string $title
     * @param InputDocumentEmpty|InputDocument|null $document
     * @param list<InputThemeSettings>|null $settings
     * @return Future<Theme|null>
     * @see https://core.telegram.org/method/account.createTheme
     * @api
     */
    public function createThemeAsync(string $slug, string $title, ?AbstractInputDocument $document = null, ?array $settings = null): Future
    {
        return $this->client->call(new CreateThemeRequest(slug: $slug, title: $title, document: $document, settings: $settings));
    }

    /**
     * @param string $slug
     * @param string $title
     * @param InputDocumentEmpty|InputDocument|null $document
     * @param list<InputThemeSettings>|null $settings
     * @return Theme|null
     * @see https://core.telegram.org/method/account.createTheme
     * @api
     */
    public function createTheme(string $slug, string $title, ?AbstractInputDocument $document = null, ?array $settings = null): ?Theme
    {
        return $this->createThemeAsync(slug: $slug, title: $title, document: $document, settings: $settings)->await();
    }

    /**
     * @param string $format
     * @param InputTheme|InputThemeSlug $theme
     * @param string|null $slug
     * @param string|null $title
     * @param InputDocumentEmpty|InputDocument|null $document
     * @param list<InputThemeSettings>|null $settings
     * @return Future<Theme|null>
     * @see https://core.telegram.org/method/account.updateTheme
     * @api
     */
    public function updateThemeAsync(string $format, AbstractInputTheme $theme, ?string $slug = null, ?string $title = null, ?AbstractInputDocument $document = null, ?array $settings = null): Future
    {
        return $this->client->call(new UpdateThemeRequest(format: $format, theme: $theme, slug: $slug, title: $title, document: $document, settings: $settings));
    }

    /**
     * @param string $format
     * @param InputTheme|InputThemeSlug $theme
     * @param string|null $slug
     * @param string|null $title
     * @param InputDocumentEmpty|InputDocument|null $document
     * @param list<InputThemeSettings>|null $settings
     * @return Theme|null
     * @see https://core.telegram.org/method/account.updateTheme
     * @api
     */
    public function updateTheme(string $format, AbstractInputTheme $theme, ?string $slug = null, ?string $title = null, ?AbstractInputDocument $document = null, ?array $settings = null): ?Theme
    {
        return $this->updateThemeAsync(format: $format, theme: $theme, slug: $slug, title: $title, document: $document, settings: $settings)->await();
    }

    /**
     * @param InputTheme|InputThemeSlug $theme
     * @param bool $unsave
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.saveTheme
     * @api
     */
    public function saveThemeAsync(AbstractInputTheme $theme, bool $unsave): Future
    {
        return $this->client->call(new SaveThemeRequest(theme: $theme, unsave: $unsave));
    }

    /**
     * @param InputTheme|InputThemeSlug $theme
     * @param bool $unsave
     * @return bool
     * @see https://core.telegram.org/method/account.saveTheme
     * @api
     */
    public function saveTheme(AbstractInputTheme $theme, bool $unsave): bool
    {
        return (bool) $this->saveThemeAsync(theme: $theme, unsave: $unsave)->await();
    }

    /**
     * @param bool|null $dark
     * @param InputTheme|InputThemeSlug|null $theme
     * @param string|null $format
     * @param BaseTheme|null $baseTheme
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.installTheme
     * @api
     */
    public function installThemeAsync(?bool $dark = null, ?AbstractInputTheme $theme = null, ?string $format = null, ?BaseTheme $baseTheme = null): Future
    {
        return $this->client->call(new InstallThemeRequest(dark: $dark, theme: $theme, format: $format, baseTheme: $baseTheme));
    }

    /**
     * @param bool|null $dark
     * @param InputTheme|InputThemeSlug|null $theme
     * @param string|null $format
     * @param BaseTheme|null $baseTheme
     * @return bool
     * @see https://core.telegram.org/method/account.installTheme
     * @api
     */
    public function installTheme(?bool $dark = null, ?AbstractInputTheme $theme = null, ?string $format = null, ?BaseTheme $baseTheme = null): bool
    {
        return (bool) $this->installThemeAsync(dark: $dark, theme: $theme, format: $format, baseTheme: $baseTheme)->await();
    }

    /**
     * @param string $format
     * @param InputTheme|InputThemeSlug $theme
     * @return Future<Theme|null>
     * @see https://core.telegram.org/method/account.getTheme
     * @api
     */
    public function getThemeAsync(string $format, AbstractInputTheme $theme): Future
    {
        return $this->client->call(new GetThemeRequest(format: $format, theme: $theme));
    }

    /**
     * @param string $format
     * @param InputTheme|InputThemeSlug $theme
     * @return Theme|null
     * @see https://core.telegram.org/method/account.getTheme
     * @api
     */
    public function getTheme(string $format, AbstractInputTheme $theme): ?Theme
    {
        return $this->getThemeAsync(format: $format, theme: $theme)->await();
    }

    /**
     * @param string $format
     * @param int $hash
     * @return Future<ThemesNotModified|Themes|null>
     * @see https://core.telegram.org/method/account.getThemes
     * @api
     */
    public function getThemesAsync(string $format, int $hash): Future
    {
        return $this->client->call(new GetThemesRequest(format: $format, hash: $hash));
    }

    /**
     * @param string $format
     * @param int $hash
     * @return ThemesNotModified|Themes|null
     * @see https://core.telegram.org/method/account.getThemes
     * @api
     */
    public function getThemes(string $format, int $hash): ?AbstractThemes
    {
        return $this->getThemesAsync(format: $format, hash: $hash)->await();
    }

    /**
     * @param bool|null $sensitiveEnabled
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.setContentSettings
     * @api
     */
    public function setContentSettingsAsync(?bool $sensitiveEnabled = null): Future
    {
        return $this->client->call(new SetContentSettingsRequest(sensitiveEnabled: $sensitiveEnabled));
    }

    /**
     * @param bool|null $sensitiveEnabled
     * @return bool
     * @see https://core.telegram.org/method/account.setContentSettings
     * @api
     */
    public function setContentSettings(?bool $sensitiveEnabled = null): bool
    {
        return (bool) $this->setContentSettingsAsync(sensitiveEnabled: $sensitiveEnabled)->await();
    }

    /**
     * @return Future<ContentSettings|null>
     * @see https://core.telegram.org/method/account.getContentSettings
     * @api
     */
    public function getContentSettingsAsync(): Future
    {
        return $this->client->call(new GetContentSettingsRequest());
    }

    /**
     * @return ContentSettings|null
     * @see https://core.telegram.org/method/account.getContentSettings
     * @api
     */
    public function getContentSettings(): ?ContentSettings
    {
        return $this->getContentSettingsAsync()->await();
    }

    /**
     * @param list<InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile> $wallpapers
     * @return Future<list<WallPaper|WallPaperNoFile>>
     * @see https://core.telegram.org/method/account.getMultiWallPapers
     * @api
     */
    public function getMultiWallPapersAsync(array $wallpapers): Future
    {
        return $this->client->call(new GetMultiWallPapersRequest(wallpapers: $wallpapers));
    }

    /**
     * @param list<InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile> $wallpapers
     * @return list<WallPaper|WallPaperNoFile>
     * @see https://core.telegram.org/method/account.getMultiWallPapers
     * @api
     */
    public function getMultiWallPapers(array $wallpapers): array
    {
        return $this->getMultiWallPapersAsync(wallpapers: $wallpapers)->await();
    }

    /**
     * @return Future<GlobalPrivacySettings|null>
     * @see https://core.telegram.org/method/account.getGlobalPrivacySettings
     * @api
     */
    public function getGlobalPrivacySettingsAsync(): Future
    {
        return $this->client->call(new GetGlobalPrivacySettingsRequest());
    }

    /**
     * @return GlobalPrivacySettings|null
     * @see https://core.telegram.org/method/account.getGlobalPrivacySettings
     * @api
     */
    public function getGlobalPrivacySettings(): ?GlobalPrivacySettings
    {
        return $this->getGlobalPrivacySettingsAsync()->await();
    }

    /**
     * @param GlobalPrivacySettings $settings
     * @return Future<GlobalPrivacySettings|null>
     * @see https://core.telegram.org/method/account.setGlobalPrivacySettings
     * @api
     */
    public function setGlobalPrivacySettingsAsync(GlobalPrivacySettings $settings): Future
    {
        return $this->client->call(new SetGlobalPrivacySettingsRequest(settings: $settings));
    }

    /**
     * @param GlobalPrivacySettings $settings
     * @return GlobalPrivacySettings|null
     * @see https://core.telegram.org/method/account.setGlobalPrivacySettings
     * @api
     */
    public function setGlobalPrivacySettings(GlobalPrivacySettings $settings): ?GlobalPrivacySettings
    {
        return $this->setGlobalPrivacySettingsAsync(settings: $settings)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputPhotoEmpty|InputPhoto $photoId
     * @param ReportReason $reason
     * @param string $message
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.reportProfilePhoto
     * @api
     */
    public function reportProfilePhotoAsync(AbstractInputPeer|string|int $peer, AbstractInputPhoto $photoId, ReportReason $reason, string $message): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ReportProfilePhotoRequest(peer: $peer, photoId: $photoId, reason: $reason, message: $message));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputPhotoEmpty|InputPhoto $photoId
     * @param ReportReason $reason
     * @param string $message
     * @return bool
     * @see https://core.telegram.org/method/account.reportProfilePhoto
     * @api
     */
    public function reportProfilePhoto(AbstractInputPeer|string|int $peer, AbstractInputPhoto $photoId, ReportReason $reason, string $message): bool
    {
        return (bool) $this->reportProfilePhotoAsync(peer: $peer, photoId: $photoId, reason: $reason, message: $message)->await();
    }

    /**
     * @return Future<ResetPasswordFailedWait|ResetPasswordRequestedWait|ResetPasswordOk|null>
     * @see https://core.telegram.org/method/account.resetPassword
     * @api
     */
    public function resetPasswordAsync(): Future
    {
        return $this->client->call(new ResetPasswordRequest());
    }

    /**
     * @return ResetPasswordFailedWait|ResetPasswordRequestedWait|ResetPasswordOk|null
     * @see https://core.telegram.org/method/account.resetPassword
     * @api
     */
    public function resetPassword(): ?AbstractResetPasswordResult
    {
        return $this->resetPasswordAsync()->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.declinePasswordReset
     * @api
     */
    public function declinePasswordResetAsync(): Future
    {
        return $this->client->call(new DeclinePasswordResetRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.declinePasswordReset
     * @api
     */
    public function declinePasswordReset(): bool
    {
        return (bool) $this->declinePasswordResetAsync()->await();
    }

    /**
     * @param int $hash
     * @return Future<ThemesNotModified|Themes|null>
     * @see https://core.telegram.org/method/account.getChatThemes
     * @api
     */
    public function getChatThemesAsync(int $hash): Future
    {
        return $this->client->call(new GetChatThemesRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return ThemesNotModified|Themes|null
     * @see https://core.telegram.org/method/account.getChatThemes
     * @api
     */
    public function getChatThemes(int $hash): ?AbstractThemes
    {
        return $this->getChatThemesAsync(hash: $hash)->await();
    }

    /**
     * @param int $authorizationTtlDays
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.setAuthorizationTTL
     * @api
     */
    public function setAuthorizationTTLAsync(int $authorizationTtlDays): Future
    {
        return $this->client->call(new SetAuthorizationTTLRequest(authorizationTtlDays: $authorizationTtlDays));
    }

    /**
     * @param int $authorizationTtlDays
     * @return bool
     * @see https://core.telegram.org/method/account.setAuthorizationTTL
     * @api
     */
    public function setAuthorizationTTL(int $authorizationTtlDays): bool
    {
        return (bool) $this->setAuthorizationTTLAsync(authorizationTtlDays: $authorizationTtlDays)->await();
    }

    /**
     * @param int $hash
     * @param bool|null $confirmed
     * @param bool|null $encryptedRequestsDisabled
     * @param bool|null $callRequestsDisabled
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.changeAuthorizationSettings
     * @api
     */
    public function changeAuthorizationSettingsAsync(int $hash, ?bool $confirmed = null, ?bool $encryptedRequestsDisabled = null, ?bool $callRequestsDisabled = null): Future
    {
        return $this->client->call(new ChangeAuthorizationSettingsRequest(hash: $hash, confirmed: $confirmed, encryptedRequestsDisabled: $encryptedRequestsDisabled, callRequestsDisabled: $callRequestsDisabled));
    }

    /**
     * @param int $hash
     * @param bool|null $confirmed
     * @param bool|null $encryptedRequestsDisabled
     * @param bool|null $callRequestsDisabled
     * @return bool
     * @see https://core.telegram.org/method/account.changeAuthorizationSettings
     * @api
     */
    public function changeAuthorizationSettings(int $hash, ?bool $confirmed = null, ?bool $encryptedRequestsDisabled = null, ?bool $callRequestsDisabled = null): bool
    {
        return (bool) $this->changeAuthorizationSettingsAsync(hash: $hash, confirmed: $confirmed, encryptedRequestsDisabled: $encryptedRequestsDisabled, callRequestsDisabled: $callRequestsDisabled)->await();
    }

    /**
     * @param int $hash
     * @return Future<SavedRingtonesNotModified|SavedRingtones|null>
     * @see https://core.telegram.org/method/account.getSavedRingtones
     * @api
     */
    public function getSavedRingtonesAsync(int $hash): Future
    {
        return $this->client->call(new GetSavedRingtonesRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return SavedRingtonesNotModified|SavedRingtones|null
     * @see https://core.telegram.org/method/account.getSavedRingtones
     * @api
     */
    public function getSavedRingtones(int $hash): ?AbstractSavedRingtones
    {
        return $this->getSavedRingtonesAsync(hash: $hash)->await();
    }

    /**
     * @param InputDocumentEmpty|InputDocument $id
     * @param bool $unsave
     * @return Future<SavedRingtone|SavedRingtoneConverted|null>
     * @see https://core.telegram.org/method/account.saveRingtone
     * @api
     */
    public function saveRingtoneAsync(AbstractInputDocument $id, bool $unsave): Future
    {
        return $this->client->call(new SaveRingtoneRequest(id: $id, unsave: $unsave));
    }

    /**
     * @param InputDocumentEmpty|InputDocument $id
     * @param bool $unsave
     * @return SavedRingtone|SavedRingtoneConverted|null
     * @see https://core.telegram.org/method/account.saveRingtone
     * @api
     */
    public function saveRingtone(AbstractInputDocument $id, bool $unsave): ?AbstractSavedRingtone
    {
        return $this->saveRingtoneAsync(id: $id, unsave: $unsave)->await();
    }

    /**
     * @param InputFile|InputFileBig|InputFileStoryDocument $file
     * @param string $fileName
     * @param string $mimeType
     * @return Future<DocumentEmpty|Document|null>
     * @see https://core.telegram.org/method/account.uploadRingtone
     * @api
     */
    public function uploadRingtoneAsync(AbstractInputFile $file, string $fileName, string $mimeType): Future
    {
        return $this->client->call(new UploadRingtoneRequest(file: $file, fileName: $fileName, mimeType: $mimeType));
    }

    /**
     * @param InputFile|InputFileBig|InputFileStoryDocument $file
     * @param string $fileName
     * @param string $mimeType
     * @return DocumentEmpty|Document|null
     * @see https://core.telegram.org/method/account.uploadRingtone
     * @api
     */
    public function uploadRingtone(AbstractInputFile $file, string $fileName, string $mimeType): ?AbstractDocument
    {
        return $this->uploadRingtoneAsync(file: $file, fileName: $fileName, mimeType: $mimeType)->await();
    }

    /**
     * @param EmojiStatusEmpty|EmojiStatus|EmojiStatusCollectible|InputEmojiStatusCollectible $emojiStatus
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updateEmojiStatus
     * @api
     */
    public function updateEmojiStatusAsync(AbstractEmojiStatus $emojiStatus): Future
    {
        return $this->client->call(new UpdateEmojiStatusRequest(emojiStatus: $emojiStatus));
    }

    /**
     * @param EmojiStatusEmpty|EmojiStatus|EmojiStatusCollectible|InputEmojiStatusCollectible $emojiStatus
     * @return bool
     * @see https://core.telegram.org/method/account.updateEmojiStatus
     * @api
     */
    public function updateEmojiStatus(AbstractEmojiStatus $emojiStatus): bool
    {
        return (bool) $this->updateEmojiStatusAsync(emojiStatus: $emojiStatus)->await();
    }

    /**
     * @param int $hash
     * @return Future<EmojiStatusesNotModified|EmojiStatuses|null>
     * @see https://core.telegram.org/method/account.getDefaultEmojiStatuses
     * @api
     */
    public function getDefaultEmojiStatusesAsync(int $hash): Future
    {
        return $this->client->call(new GetDefaultEmojiStatusesRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return EmojiStatusesNotModified|EmojiStatuses|null
     * @see https://core.telegram.org/method/account.getDefaultEmojiStatuses
     * @api
     */
    public function getDefaultEmojiStatuses(int $hash): ?AbstractEmojiStatuses
    {
        return $this->getDefaultEmojiStatusesAsync(hash: $hash)->await();
    }

    /**
     * @param int $hash
     * @return Future<EmojiStatusesNotModified|EmojiStatuses|null>
     * @see https://core.telegram.org/method/account.getRecentEmojiStatuses
     * @api
     */
    public function getRecentEmojiStatusesAsync(int $hash): Future
    {
        return $this->client->call(new GetRecentEmojiStatusesRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return EmojiStatusesNotModified|EmojiStatuses|null
     * @see https://core.telegram.org/method/account.getRecentEmojiStatuses
     * @api
     */
    public function getRecentEmojiStatuses(int $hash): ?AbstractEmojiStatuses
    {
        return $this->getRecentEmojiStatusesAsync(hash: $hash)->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.clearRecentEmojiStatuses
     * @api
     */
    public function clearRecentEmojiStatusesAsync(): Future
    {
        return $this->client->call(new ClearRecentEmojiStatusesRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.clearRecentEmojiStatuses
     * @api
     */
    public function clearRecentEmojiStatuses(): bool
    {
        return (bool) $this->clearRecentEmojiStatusesAsync()->await();
    }

    /**
     * @param list<string> $order
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.reorderUsernames
     * @api
     */
    public function reorderUsernamesAsync(array $order): Future
    {
        return $this->client->call(new ReorderUsernamesRequest(order: $order));
    }

    /**
     * @param list<string> $order
     * @return bool
     * @see https://core.telegram.org/method/account.reorderUsernames
     * @api
     */
    public function reorderUsernames(array $order): bool
    {
        return (bool) $this->reorderUsernamesAsync(order: $order)->await();
    }

    /**
     * @param string $username
     * @param bool $active
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.toggleUsername
     * @api
     */
    public function toggleUsernameAsync(string $username, bool $active): Future
    {
        return $this->client->call(new ToggleUsernameRequest(username: $username, active: $active));
    }

    /**
     * @param string $username
     * @param bool $active
     * @return bool
     * @see https://core.telegram.org/method/account.toggleUsername
     * @api
     */
    public function toggleUsername(string $username, bool $active): bool
    {
        return (bool) $this->toggleUsernameAsync(username: $username, active: $active)->await();
    }

    /**
     * @param int $hash
     * @return Future<EmojiListNotModified|EmojiList|null>
     * @see https://core.telegram.org/method/account.getDefaultProfilePhotoEmojis
     * @api
     */
    public function getDefaultProfilePhotoEmojisAsync(int $hash): Future
    {
        return $this->client->call(new GetDefaultProfilePhotoEmojisRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return EmojiListNotModified|EmojiList|null
     * @see https://core.telegram.org/method/account.getDefaultProfilePhotoEmojis
     * @api
     */
    public function getDefaultProfilePhotoEmojis(int $hash): ?AbstractEmojiList
    {
        return $this->getDefaultProfilePhotoEmojisAsync(hash: $hash)->await();
    }

    /**
     * @param int $hash
     * @return Future<EmojiListNotModified|EmojiList|null>
     * @see https://core.telegram.org/method/account.getDefaultGroupPhotoEmojis
     * @api
     */
    public function getDefaultGroupPhotoEmojisAsync(int $hash): Future
    {
        return $this->client->call(new GetDefaultGroupPhotoEmojisRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return EmojiListNotModified|EmojiList|null
     * @see https://core.telegram.org/method/account.getDefaultGroupPhotoEmojis
     * @api
     */
    public function getDefaultGroupPhotoEmojis(int $hash): ?AbstractEmojiList
    {
        return $this->getDefaultGroupPhotoEmojisAsync(hash: $hash)->await();
    }

    /**
     * @return Future<AutoSaveSettings|null>
     * @see https://core.telegram.org/method/account.getAutoSaveSettings
     * @api
     */
    public function getAutoSaveSettingsAsync(): Future
    {
        return $this->client->call(new GetAutoSaveSettingsRequest());
    }

    /**
     * @return AutoSaveSettings|null
     * @see https://core.telegram.org/method/account.getAutoSaveSettings
     * @api
     */
    public function getAutoSaveSettings(): ?AutoSaveSettings
    {
        return $this->getAutoSaveSettingsAsync()->await();
    }

    /**
     * @param BaseAutoSaveSettings $settings
     * @param bool|null $users
     * @param bool|null $chats
     * @param bool|null $broadcasts
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $peer
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.saveAutoSaveSettings
     * @api
     */
    public function saveAutoSaveSettingsAsync(BaseAutoSaveSettings $settings, ?bool $users = null, ?bool $chats = null, ?bool $broadcasts = null, AbstractInputPeer|string|int|null $peer = null): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new SaveAutoSaveSettingsRequest(settings: $settings, users: $users, chats: $chats, broadcasts: $broadcasts, peer: $peer));
    }

    /**
     * @param BaseAutoSaveSettings $settings
     * @param bool|null $users
     * @param bool|null $chats
     * @param bool|null $broadcasts
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $peer
     * @return bool
     * @see https://core.telegram.org/method/account.saveAutoSaveSettings
     * @api
     */
    public function saveAutoSaveSettings(BaseAutoSaveSettings $settings, ?bool $users = null, ?bool $chats = null, ?bool $broadcasts = null, AbstractInputPeer|string|int|null $peer = null): bool
    {
        return (bool) $this->saveAutoSaveSettingsAsync(settings: $settings, users: $users, chats: $chats, broadcasts: $broadcasts, peer: $peer)->await();
    }

    /**
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.deleteAutoSaveExceptions
     * @api
     */
    public function deleteAutoSaveExceptionsAsync(): Future
    {
        return $this->client->call(new DeleteAutoSaveExceptionsRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.deleteAutoSaveExceptions
     * @api
     */
    public function deleteAutoSaveExceptions(): bool
    {
        return (bool) $this->deleteAutoSaveExceptionsAsync()->await();
    }

    /**
     * @param list<string> $codes
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.invalidateSignInCodes
     * @api
     */
    public function invalidateSignInCodesAsync(array $codes): Future
    {
        return $this->client->call(new InvalidateSignInCodesRequest(codes: $codes));
    }

    /**
     * @param list<string> $codes
     * @return bool
     * @see https://core.telegram.org/method/account.invalidateSignInCodes
     * @api
     */
    public function invalidateSignInCodes(array $codes): bool
    {
        return (bool) $this->invalidateSignInCodesAsync(codes: $codes)->await();
    }

    /**
     * @param bool|null $forProfile
     * @param PeerColor|PeerColorCollectible|InputPeerColorCollectible|null $color
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updateColor
     * @api
     */
    public function updateColorAsync(?bool $forProfile = null, ?AbstractPeerColor $color = null): Future
    {
        return $this->client->call(new UpdateColorRequest(forProfile: $forProfile, color: $color));
    }

    /**
     * @param bool|null $forProfile
     * @param PeerColor|PeerColorCollectible|InputPeerColorCollectible|null $color
     * @return bool
     * @see https://core.telegram.org/method/account.updateColor
     * @api
     */
    public function updateColor(?bool $forProfile = null, ?AbstractPeerColor $color = null): bool
    {
        return (bool) $this->updateColorAsync(forProfile: $forProfile, color: $color)->await();
    }

    /**
     * @param int $hash
     * @return Future<EmojiListNotModified|EmojiList|null>
     * @see https://core.telegram.org/method/account.getDefaultBackgroundEmojis
     * @api
     */
    public function getDefaultBackgroundEmojisAsync(int $hash): Future
    {
        return $this->client->call(new GetDefaultBackgroundEmojisRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return EmojiListNotModified|EmojiList|null
     * @see https://core.telegram.org/method/account.getDefaultBackgroundEmojis
     * @api
     */
    public function getDefaultBackgroundEmojis(int $hash): ?AbstractEmojiList
    {
        return $this->getDefaultBackgroundEmojisAsync(hash: $hash)->await();
    }

    /**
     * @param int $hash
     * @return Future<EmojiStatusesNotModified|EmojiStatuses|null>
     * @see https://core.telegram.org/method/account.getChannelDefaultEmojiStatuses
     * @api
     */
    public function getChannelDefaultEmojiStatusesAsync(int $hash): Future
    {
        return $this->client->call(new GetChannelDefaultEmojiStatusesRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return EmojiStatusesNotModified|EmojiStatuses|null
     * @see https://core.telegram.org/method/account.getChannelDefaultEmojiStatuses
     * @api
     */
    public function getChannelDefaultEmojiStatuses(int $hash): ?AbstractEmojiStatuses
    {
        return $this->getChannelDefaultEmojiStatusesAsync(hash: $hash)->await();
    }

    /**
     * @param int $hash
     * @return Future<EmojiListNotModified|EmojiList|null>
     * @see https://core.telegram.org/method/account.getChannelRestrictedStatusEmojis
     * @api
     */
    public function getChannelRestrictedStatusEmojisAsync(int $hash): Future
    {
        return $this->client->call(new GetChannelRestrictedStatusEmojisRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return EmojiListNotModified|EmojiList|null
     * @see https://core.telegram.org/method/account.getChannelRestrictedStatusEmojis
     * @api
     */
    public function getChannelRestrictedStatusEmojis(int $hash): ?AbstractEmojiList
    {
        return $this->getChannelRestrictedStatusEmojisAsync(hash: $hash)->await();
    }

    /**
     * @param BusinessWorkHours|null $businessWorkHours
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updateBusinessWorkHours
     * @api
     */
    public function updateBusinessWorkHoursAsync(?BusinessWorkHours $businessWorkHours = null): Future
    {
        return $this->client->call(new UpdateBusinessWorkHoursRequest(businessWorkHours: $businessWorkHours));
    }

    /**
     * @param BusinessWorkHours|null $businessWorkHours
     * @return bool
     * @see https://core.telegram.org/method/account.updateBusinessWorkHours
     * @api
     */
    public function updateBusinessWorkHours(?BusinessWorkHours $businessWorkHours = null): bool
    {
        return (bool) $this->updateBusinessWorkHoursAsync(businessWorkHours: $businessWorkHours)->await();
    }

    /**
     * @param InputGeoPointEmpty|InputGeoPoint|null $geoPoint
     * @param string|null $address
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updateBusinessLocation
     * @api
     */
    public function updateBusinessLocationAsync(?AbstractInputGeoPoint $geoPoint = null, ?string $address = null): Future
    {
        return $this->client->call(new UpdateBusinessLocationRequest(geoPoint: $geoPoint, address: $address));
    }

    /**
     * @param InputGeoPointEmpty|InputGeoPoint|null $geoPoint
     * @param string|null $address
     * @return bool
     * @see https://core.telegram.org/method/account.updateBusinessLocation
     * @api
     */
    public function updateBusinessLocation(?AbstractInputGeoPoint $geoPoint = null, ?string $address = null): bool
    {
        return (bool) $this->updateBusinessLocationAsync(geoPoint: $geoPoint, address: $address)->await();
    }

    /**
     * @param InputBusinessGreetingMessage|null $message
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updateBusinessGreetingMessage
     * @api
     */
    public function updateBusinessGreetingMessageAsync(?InputBusinessGreetingMessage $message = null): Future
    {
        return $this->client->call(new UpdateBusinessGreetingMessageRequest(message: $message));
    }

    /**
     * @param InputBusinessGreetingMessage|null $message
     * @return bool
     * @see https://core.telegram.org/method/account.updateBusinessGreetingMessage
     * @api
     */
    public function updateBusinessGreetingMessage(?InputBusinessGreetingMessage $message = null): bool
    {
        return (bool) $this->updateBusinessGreetingMessageAsync(message: $message)->await();
    }

    /**
     * @param InputBusinessAwayMessage|null $message
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updateBusinessAwayMessage
     * @api
     */
    public function updateBusinessAwayMessageAsync(?InputBusinessAwayMessage $message = null): Future
    {
        return $this->client->call(new UpdateBusinessAwayMessageRequest(message: $message));
    }

    /**
     * @param InputBusinessAwayMessage|null $message
     * @return bool
     * @see https://core.telegram.org/method/account.updateBusinessAwayMessage
     * @api
     */
    public function updateBusinessAwayMessage(?InputBusinessAwayMessage $message = null): bool
    {
        return (bool) $this->updateBusinessAwayMessageAsync(message: $message)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param InputBusinessBotRecipients $recipients
     * @param bool|null $deleted
     * @param BusinessBotRights|null $rights
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/account.updateConnectedBot
     * @api
     */
    public function updateConnectedBotAsync(AbstractInputUser|string|int $bot, InputBusinessBotRecipients $recipients, ?bool $deleted = null, ?BusinessBotRights $rights = null): Future
    {
        if (is_string($bot) || is_int($bot)) {
            $__tmpPeer = $this->client->peerManager->resolve($bot);
            if ($__tmpPeer instanceof InputPeerUser) {
                $bot = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $bot = $__tmpPeer;
            }
        }
        return $this->client->call(new UpdateConnectedBotRequest(bot: $bot, recipients: $recipients, deleted: $deleted, rights: $rights));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $bot
     * @param InputBusinessBotRecipients $recipients
     * @param bool|null $deleted
     * @param BusinessBotRights|null $rights
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/account.updateConnectedBot
     * @api
     */
    public function updateConnectedBot(AbstractInputUser|string|int $bot, InputBusinessBotRecipients $recipients, ?bool $deleted = null, ?BusinessBotRights $rights = null): ?AbstractUpdates
    {
        return $this->updateConnectedBotAsync(bot: $bot, recipients: $recipients, deleted: $deleted, rights: $rights)->await();
    }

    /**
     * @return Future<ConnectedBots|null>
     * @see https://core.telegram.org/method/account.getConnectedBots
     * @api
     */
    public function getConnectedBotsAsync(): Future
    {
        return $this->client->call(new GetConnectedBotsRequest());
    }

    /**
     * @return ConnectedBots|null
     * @see https://core.telegram.org/method/account.getConnectedBots
     * @api
     */
    public function getConnectedBots(): ?ConnectedBots
    {
        return $this->getConnectedBotsAsync()->await();
    }

    /**
     * @param string $connectionId
     * @return Future<UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null>
     * @see https://core.telegram.org/method/account.getBotBusinessConnection
     * @api
     */
    public function getBotBusinessConnectionAsync(string $connectionId): Future
    {
        return $this->client->call(new GetBotBusinessConnectionRequest(connectionId: $connectionId));
    }

    /**
     * @param string $connectionId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/account.getBotBusinessConnection
     * @api
     */
    public function getBotBusinessConnection(string $connectionId): ?AbstractUpdates
    {
        return $this->getBotBusinessConnectionAsync(connectionId: $connectionId)->await();
    }

    /**
     * @param InputBusinessIntro|null $intro
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updateBusinessIntro
     * @api
     */
    public function updateBusinessIntroAsync(?InputBusinessIntro $intro = null): Future
    {
        return $this->client->call(new UpdateBusinessIntroRequest(intro: $intro));
    }

    /**
     * @param InputBusinessIntro|null $intro
     * @return bool
     * @see https://core.telegram.org/method/account.updateBusinessIntro
     * @api
     */
    public function updateBusinessIntro(?InputBusinessIntro $intro = null): bool
    {
        return (bool) $this->updateBusinessIntroAsync(intro: $intro)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool $paused
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.toggleConnectedBotPaused
     * @api
     */
    public function toggleConnectedBotPausedAsync(AbstractInputPeer|string|int $peer, bool $paused): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new ToggleConnectedBotPausedRequest(peer: $peer, paused: $paused));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param bool $paused
     * @return bool
     * @see https://core.telegram.org/method/account.toggleConnectedBotPaused
     * @api
     */
    public function toggleConnectedBotPaused(AbstractInputPeer|string|int $peer, bool $paused): bool
    {
        return (bool) $this->toggleConnectedBotPausedAsync(peer: $peer, paused: $paused)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.disablePeerConnectedBot
     * @api
     */
    public function disablePeerConnectedBotAsync(AbstractInputPeer|string|int $peer): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new DisablePeerConnectedBotRequest(peer: $peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return bool
     * @see https://core.telegram.org/method/account.disablePeerConnectedBot
     * @api
     */
    public function disablePeerConnectedBot(AbstractInputPeer|string|int $peer): bool
    {
        return (bool) $this->disablePeerConnectedBotAsync(peer: $peer)->await();
    }

    /**
     * @param Birthday|null $birthday
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updateBirthday
     * @api
     */
    public function updateBirthdayAsync(?Birthday $birthday = null): Future
    {
        return $this->client->call(new UpdateBirthdayRequest(birthday: $birthday));
    }

    /**
     * @param Birthday|null $birthday
     * @return bool
     * @see https://core.telegram.org/method/account.updateBirthday
     * @api
     */
    public function updateBirthday(?Birthday $birthday = null): bool
    {
        return (bool) $this->updateBirthdayAsync(birthday: $birthday)->await();
    }

    /**
     * @param InputBusinessChatLink $link
     * @return Future<BusinessChatLink|null>
     * @see https://core.telegram.org/method/account.createBusinessChatLink
     * @api
     */
    public function createBusinessChatLinkAsync(InputBusinessChatLink $link): Future
    {
        return $this->client->call(new CreateBusinessChatLinkRequest(link: $link));
    }

    /**
     * @param InputBusinessChatLink $link
     * @return BusinessChatLink|null
     * @see https://core.telegram.org/method/account.createBusinessChatLink
     * @api
     */
    public function createBusinessChatLink(InputBusinessChatLink $link): ?BusinessChatLink
    {
        return $this->createBusinessChatLinkAsync(link: $link)->await();
    }

    /**
     * @param string $slug
     * @param InputBusinessChatLink $link
     * @return Future<BusinessChatLink|null>
     * @see https://core.telegram.org/method/account.editBusinessChatLink
     * @api
     */
    public function editBusinessChatLinkAsync(string $slug, InputBusinessChatLink $link): Future
    {
        return $this->client->call(new EditBusinessChatLinkRequest(slug: $slug, link: $link));
    }

    /**
     * @param string $slug
     * @param InputBusinessChatLink $link
     * @return BusinessChatLink|null
     * @see https://core.telegram.org/method/account.editBusinessChatLink
     * @api
     */
    public function editBusinessChatLink(string $slug, InputBusinessChatLink $link): ?BusinessChatLink
    {
        return $this->editBusinessChatLinkAsync(slug: $slug, link: $link)->await();
    }

    /**
     * @param string $slug
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.deleteBusinessChatLink
     * @api
     */
    public function deleteBusinessChatLinkAsync(string $slug): Future
    {
        return $this->client->call(new DeleteBusinessChatLinkRequest(slug: $slug));
    }

    /**
     * @param string $slug
     * @return bool
     * @see https://core.telegram.org/method/account.deleteBusinessChatLink
     * @api
     */
    public function deleteBusinessChatLink(string $slug): bool
    {
        return (bool) $this->deleteBusinessChatLinkAsync(slug: $slug)->await();
    }

    /**
     * @return Future<BusinessChatLinks|null>
     * @see https://core.telegram.org/method/account.getBusinessChatLinks
     * @api
     */
    public function getBusinessChatLinksAsync(): Future
    {
        return $this->client->call(new GetBusinessChatLinksRequest());
    }

    /**
     * @return BusinessChatLinks|null
     * @see https://core.telegram.org/method/account.getBusinessChatLinks
     * @api
     */
    public function getBusinessChatLinks(): ?BusinessChatLinks
    {
        return $this->getBusinessChatLinksAsync()->await();
    }

    /**
     * @param string $slug
     * @return Future<ResolvedBusinessChatLinks|null>
     * @see https://core.telegram.org/method/account.resolveBusinessChatLink
     * @api
     */
    public function resolveBusinessChatLinkAsync(string $slug): Future
    {
        return $this->client->call(new ResolveBusinessChatLinkRequest(slug: $slug));
    }

    /**
     * @param string $slug
     * @return ResolvedBusinessChatLinks|null
     * @see https://core.telegram.org/method/account.resolveBusinessChatLink
     * @api
     */
    public function resolveBusinessChatLink(string $slug): ?ResolvedBusinessChatLinks
    {
        return $this->resolveBusinessChatLinkAsync(slug: $slug)->await();
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.updatePersonalChannel
     * @api
     */
    public function updatePersonalChannelAsync(AbstractInputChannel|string|int $channel): Future
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->call(new UpdatePersonalChannelRequest(channel: $channel));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @return bool
     * @see https://core.telegram.org/method/account.updatePersonalChannel
     * @api
     */
    public function updatePersonalChannel(AbstractInputChannel|string|int $channel): bool
    {
        return (bool) $this->updatePersonalChannelAsync(channel: $channel)->await();
    }

    /**
     * @param bool $enabled
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.toggleSponsoredMessages
     * @api
     */
    public function toggleSponsoredMessagesAsync(bool $enabled): Future
    {
        return $this->client->call(new ToggleSponsoredMessagesRequest(enabled: $enabled));
    }

    /**
     * @param bool $enabled
     * @return bool
     * @see https://core.telegram.org/method/account.toggleSponsoredMessages
     * @api
     */
    public function toggleSponsoredMessages(bool $enabled): bool
    {
        return (bool) $this->toggleSponsoredMessagesAsync(enabled: $enabled)->await();
    }

    /**
     * @return Future<ReactionsNotifySettings|null>
     * @see https://core.telegram.org/method/account.getReactionsNotifySettings
     * @api
     */
    public function getReactionsNotifySettingsAsync(): Future
    {
        return $this->client->call(new GetReactionsNotifySettingsRequest());
    }

    /**
     * @return ReactionsNotifySettings|null
     * @see https://core.telegram.org/method/account.getReactionsNotifySettings
     * @api
     */
    public function getReactionsNotifySettings(): ?ReactionsNotifySettings
    {
        return $this->getReactionsNotifySettingsAsync()->await();
    }

    /**
     * @param ReactionsNotifySettings $settings
     * @return Future<ReactionsNotifySettings|null>
     * @see https://core.telegram.org/method/account.setReactionsNotifySettings
     * @api
     */
    public function setReactionsNotifySettingsAsync(ReactionsNotifySettings $settings): Future
    {
        return $this->client->call(new SetReactionsNotifySettingsRequest(settings: $settings));
    }

    /**
     * @param ReactionsNotifySettings $settings
     * @return ReactionsNotifySettings|null
     * @see https://core.telegram.org/method/account.setReactionsNotifySettings
     * @api
     */
    public function setReactionsNotifySettings(ReactionsNotifySettings $settings): ?ReactionsNotifySettings
    {
        return $this->setReactionsNotifySettingsAsync(settings: $settings)->await();
    }

    /**
     * @param int $hash
     * @return Future<EmojiStatusesNotModified|EmojiStatuses|null>
     * @see https://core.telegram.org/method/account.getCollectibleEmojiStatuses
     * @api
     */
    public function getCollectibleEmojiStatusesAsync(int $hash): Future
    {
        return $this->client->call(new GetCollectibleEmojiStatusesRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return EmojiStatusesNotModified|EmojiStatuses|null
     * @see https://core.telegram.org/method/account.getCollectibleEmojiStatuses
     * @api
     */
    public function getCollectibleEmojiStatuses(int $hash): ?AbstractEmojiStatuses
    {
        return $this->getCollectibleEmojiStatusesAsync(hash: $hash)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return Future<PaidMessagesRevenue|null>
     * @see https://core.telegram.org/method/account.getPaidMessagesRevenue
     * @api
     */
    public function getPaidMessagesRevenueAsync(AbstractInputUser|string|int $userId, AbstractInputPeer|string|int|null $parentPeer = null): Future
    {
        if (is_string($parentPeer) || is_int($parentPeer)) {
            $parentPeer = $this->client->peerManager->resolve($parentPeer);
        }
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new GetPaidMessagesRevenueRequest(userId: $userId, parentPeer: $parentPeer));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return PaidMessagesRevenue|null
     * @see https://core.telegram.org/method/account.getPaidMessagesRevenue
     * @api
     */
    public function getPaidMessagesRevenue(AbstractInputUser|string|int $userId, AbstractInputPeer|string|int|null $parentPeer = null): ?PaidMessagesRevenue
    {
        return $this->getPaidMessagesRevenueAsync(userId: $userId, parentPeer: $parentPeer)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param bool|null $refundCharged
     * @param bool|null $requirePayment
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.toggleNoPaidMessagesException
     * @api
     */
    public function toggleNoPaidMessagesExceptionAsync(AbstractInputUser|string|int $userId, ?bool $refundCharged = null, ?bool $requirePayment = null, AbstractInputPeer|string|int|null $parentPeer = null): Future
    {
        if (is_string($parentPeer) || is_int($parentPeer)) {
            $parentPeer = $this->client->peerManager->resolve($parentPeer);
        }
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new ToggleNoPaidMessagesExceptionRequest(userId: $userId, refundCharged: $refundCharged, requirePayment: $requirePayment, parentPeer: $parentPeer));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param bool|null $refundCharged
     * @param bool|null $requirePayment
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int|null $parentPeer
     * @return bool
     * @see https://core.telegram.org/method/account.toggleNoPaidMessagesException
     * @api
     */
    public function toggleNoPaidMessagesException(AbstractInputUser|string|int $userId, ?bool $refundCharged = null, ?bool $requirePayment = null, AbstractInputPeer|string|int|null $parentPeer = null): bool
    {
        return (bool) $this->toggleNoPaidMessagesExceptionAsync(userId: $userId, refundCharged: $refundCharged, requirePayment: $requirePayment, parentPeer: $parentPeer)->await();
    }

    /**
     * @param ProfileTab $tab
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.setMainProfileTab
     * @api
     */
    public function setMainProfileTabAsync(ProfileTab $tab): Future
    {
        return $this->client->call(new SetMainProfileTabRequest(tab: $tab));
    }

    /**
     * @param ProfileTab $tab
     * @return bool
     * @see https://core.telegram.org/method/account.setMainProfileTab
     * @api
     */
    public function setMainProfileTab(ProfileTab $tab): bool
    {
        return (bool) $this->setMainProfileTabAsync(tab: $tab)->await();
    }

    /**
     * @param InputDocumentEmpty|InputDocument $id
     * @param bool|null $unsave
     * @param InputDocumentEmpty|InputDocument|null $afterId
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.saveMusic
     * @api
     */
    public function saveMusicAsync(AbstractInputDocument $id, ?bool $unsave = null, ?AbstractInputDocument $afterId = null): Future
    {
        return $this->client->call(new SaveMusicRequest(id: $id, unsave: $unsave, afterId: $afterId));
    }

    /**
     * @param InputDocumentEmpty|InputDocument $id
     * @param bool|null $unsave
     * @param InputDocumentEmpty|InputDocument|null $afterId
     * @return bool
     * @see https://core.telegram.org/method/account.saveMusic
     * @api
     */
    public function saveMusic(AbstractInputDocument $id, ?bool $unsave = null, ?AbstractInputDocument $afterId = null): bool
    {
        return (bool) $this->saveMusicAsync(id: $id, unsave: $unsave, afterId: $afterId)->await();
    }

    /**
     * @param int $hash
     * @return Future<SavedMusicIdsNotModified|SavedMusicIds|null>
     * @see https://core.telegram.org/method/account.getSavedMusicIds
     * @api
     */
    public function getSavedMusicIdsAsync(int $hash): Future
    {
        return $this->client->call(new GetSavedMusicIdsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return SavedMusicIdsNotModified|SavedMusicIds|null
     * @see https://core.telegram.org/method/account.getSavedMusicIds
     * @api
     */
    public function getSavedMusicIds(int $hash): ?AbstractSavedMusicIds
    {
        return $this->getSavedMusicIdsAsync(hash: $hash)->await();
    }

    /**
     * @param string $offset
     * @param int $limit
     * @param int $hash
     * @return Future<ChatThemesNotModified|ChatThemes|null>
     * @see https://core.telegram.org/method/account.getUniqueGiftChatThemes
     * @api
     */
    public function getUniqueGiftChatThemesAsync(string $offset, int $limit, int $hash): Future
    {
        return $this->client->call(new GetUniqueGiftChatThemesRequest(offset: $offset, limit: $limit, hash: $hash));
    }

    /**
     * @param string $offset
     * @param int $limit
     * @param int $hash
     * @return ChatThemesNotModified|ChatThemes|null
     * @see https://core.telegram.org/method/account.getUniqueGiftChatThemes
     * @api
     */
    public function getUniqueGiftChatThemes(string $offset, int $limit, int $hash): ?AbstractChatThemes
    {
        return $this->getUniqueGiftChatThemesAsync(offset: $offset, limit: $limit, hash: $hash)->await();
    }

    /**
     * @return Future<PasskeyRegistrationOptions|null>
     * @see https://core.telegram.org/method/account.initPasskeyRegistration
     * @api
     */
    public function initPasskeyRegistrationAsync(): Future
    {
        return $this->client->call(new InitPasskeyRegistrationRequest());
    }

    /**
     * @return PasskeyRegistrationOptions|null
     * @see https://core.telegram.org/method/account.initPasskeyRegistration
     * @api
     */
    public function initPasskeyRegistration(): ?PasskeyRegistrationOptions
    {
        return $this->initPasskeyRegistrationAsync()->await();
    }

    /**
     * @param InputPasskeyCredential $credential
     * @return Future<Passkey|null>
     * @see https://core.telegram.org/method/account.registerPasskey
     * @api
     */
    public function registerPasskeyAsync(InputPasskeyCredential $credential): Future
    {
        return $this->client->call(new RegisterPasskeyRequest(credential: $credential));
    }

    /**
     * @param InputPasskeyCredential $credential
     * @return Passkey|null
     * @see https://core.telegram.org/method/account.registerPasskey
     * @api
     */
    public function registerPasskey(InputPasskeyCredential $credential): ?Passkey
    {
        return $this->registerPasskeyAsync(credential: $credential)->await();
    }

    /**
     * @return Future<Passkeys|null>
     * @see https://core.telegram.org/method/account.getPasskeys
     * @api
     */
    public function getPasskeysAsync(): Future
    {
        return $this->client->call(new GetPasskeysRequest());
    }

    /**
     * @return Passkeys|null
     * @see https://core.telegram.org/method/account.getPasskeys
     * @api
     */
    public function getPasskeys(): ?Passkeys
    {
        return $this->getPasskeysAsync()->await();
    }

    /**
     * @param string $id
     * @return Future<bool>
     * @see https://core.telegram.org/method/account.deletePasskey
     * @api
     */
    public function deletePasskeyAsync(string $id): Future
    {
        return $this->client->call(new DeletePasskeyRequest(id: $id));
    }

    /**
     * @param string $id
     * @return bool
     * @see https://core.telegram.org/method/account.deletePasskey
     * @api
     */
    public function deletePasskey(string $id): bool
    {
        return (bool) $this->deletePasskeyAsync(id: $id)->await();
    }
}