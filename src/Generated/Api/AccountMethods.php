<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Account\AcceptAuthorizationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\CancelPasswordEmailRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ChangeAuthorizationSettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ChangePhoneRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\CheckUsernameRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ClearRecentEmojiStatusesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ConfirmPasswordEmailRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ConfirmPhoneRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\CreateBusinessChatLinkRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\CreateThemeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\DeclinePasswordResetRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\DeleteAccountRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\DeleteAutoSaveExceptionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\DeleteBusinessChatLinkRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\DeleteSecureValueRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\DisablePeerConnectedBotRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\EditBusinessChatLinkRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\FinishTakeoutSessionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetAccountTTLRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetAllSecureValuesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetAuthorizationFormRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetAuthorizationsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetAutoDownloadSettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetAutoSaveSettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetBotBusinessConnectionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetBusinessChatLinksRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetChannelDefaultEmojiStatusesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetChannelRestrictedStatusEmojisRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetChatThemesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetCollectibleEmojiStatusesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetConnectedBotsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetContactSignUpNotificationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetContentSettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetDefaultBackgroundEmojisRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetDefaultEmojiStatusesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetDefaultGroupPhotoEmojisRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetDefaultProfilePhotoEmojisRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetGlobalPrivacySettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetMultiWallPapersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetNotifyExceptionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetNotifySettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetPaidMessagesRevenueRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetPasswordRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetPasswordSettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetPrivacyRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetReactionsNotifySettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetRecentEmojiStatusesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetSavedRingtonesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetSecureValueRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetThemeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetThemesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetTmpPasswordRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetWallPaperRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetWallPapersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\GetWebAuthorizationsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\InitTakeoutSessionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\InstallThemeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\InstallWallPaperRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\InvalidateSignInCodesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\RegisterDeviceRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ReorderUsernamesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ReportPeerRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ReportProfilePhotoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ResendPasswordEmailRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ResetAuthorizationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ResetNotifySettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ResetPasswordRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ResetWallPapersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ResetWebAuthorizationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ResetWebAuthorizationsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ResolveBusinessChatLinkRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SaveAutoDownloadSettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SaveAutoSaveSettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SaveRingtoneRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SaveSecureValueRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SaveThemeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SaveWallPaperRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SendChangePhoneCodeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SendConfirmPhoneCodeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SendVerifyEmailCodeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SendVerifyPhoneCodeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SetAccountTTLRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SetAuthorizationTTLRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SetContactSignUpNotificationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SetContentSettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SetGlobalPrivacySettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SetPrivacyRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\SetReactionsNotifySettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ToggleConnectedBotPausedRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ToggleNoPaidMessagesExceptionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ToggleSponsoredMessagesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\ToggleUsernameRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UnregisterDeviceRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateBirthdayRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateBusinessAwayMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateBusinessGreetingMessageRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateBusinessIntroRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateBusinessLocationRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateBusinessWorkHoursRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateColorRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateConnectedBotRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateDeviceLockedRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateEmojiStatusRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateNotifySettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdatePasswordSettingsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdatePersonalChannelRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateProfileRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateStatusRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateThemeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UpdateUsernameRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UploadRingtoneRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UploadThemeRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\UploadWallPaperRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\VerifyEmailRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Account\VerifyPhoneRequest;
use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractEmailVerified;
use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractEmojiStatuses;
use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractResetPasswordResult;
use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractSavedRingtone;
use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractSavedRingtones;
use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractThemes;
use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractWallPapers;
use DigitalStars\MtprotoClient\Generated\Types\Account\AuthorizationForm;
use DigitalStars\MtprotoClient\Generated\Types\Account\Authorizations;
use DigitalStars\MtprotoClient\Generated\Types\Account\AutoDownloadSettings;
use DigitalStars\MtprotoClient\Generated\Types\Account\AutoSaveSettings;
use DigitalStars\MtprotoClient\Generated\Types\Account\BusinessChatLinks;
use DigitalStars\MtprotoClient\Generated\Types\Account\ConnectedBots;
use DigitalStars\MtprotoClient\Generated\Types\Account\ContentSettings;
use DigitalStars\MtprotoClient\Generated\Types\Account\EmailVerified;
use DigitalStars\MtprotoClient\Generated\Types\Account\EmailVerifiedLogin;
use DigitalStars\MtprotoClient\Generated\Types\Account\EmojiStatuses;
use DigitalStars\MtprotoClient\Generated\Types\Account\EmojiStatusesNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Account\PaidMessagesRevenue;
use DigitalStars\MtprotoClient\Generated\Types\Account\Password;
use DigitalStars\MtprotoClient\Generated\Types\Account\PasswordInputSettings;
use DigitalStars\MtprotoClient\Generated\Types\Account\PasswordSettings;
use DigitalStars\MtprotoClient\Generated\Types\Account\PrivacyRules;
use DigitalStars\MtprotoClient\Generated\Types\Account\ResetPasswordFailedWait;
use DigitalStars\MtprotoClient\Generated\Types\Account\ResetPasswordOk;
use DigitalStars\MtprotoClient\Generated\Types\Account\ResetPasswordRequestedWait;
use DigitalStars\MtprotoClient\Generated\Types\Account\ResolvedBusinessChatLinks;
use DigitalStars\MtprotoClient\Generated\Types\Account\SavedRingtone;
use DigitalStars\MtprotoClient\Generated\Types\Account\SavedRingtoneConverted;
use DigitalStars\MtprotoClient\Generated\Types\Account\SavedRingtones;
use DigitalStars\MtprotoClient\Generated\Types\Account\SavedRingtonesNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Account\SentEmailCode;
use DigitalStars\MtprotoClient\Generated\Types\Account\Takeout;
use DigitalStars\MtprotoClient\Generated\Types\Account\Themes;
use DigitalStars\MtprotoClient\Generated\Types\Account\ThemesNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Account\TmpPassword;
use DigitalStars\MtprotoClient\Generated\Types\Account\WallPapers;
use DigitalStars\MtprotoClient\Generated\Types\Account\WallPapersNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Account\WebAuthorizations;
use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractSentCode;
use DigitalStars\MtprotoClient\Generated\Types\Auth\SentCode;
use DigitalStars\MtprotoClient\Generated\Types\Auth\SentCodePaymentRequired;
use DigitalStars\MtprotoClient\Generated\Types\Auth\SentCodeSuccess;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmailVerification;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmailVerifyPurpose;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiList;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiStatus;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGeoPoint;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputNotifyPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPrivacyRule;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputTheme;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\AccountDaysTTL;
use DigitalStars\MtprotoClient\Generated\Types\Base\AutoDownloadSettings as BaseAutoDownloadSettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\AutoSaveSettings as BaseAutoSaveSettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\BaseTheme;
use DigitalStars\MtprotoClient\Generated\Types\Base\Birthday;
use DigitalStars\MtprotoClient\Generated\Types\Base\BusinessBotRights;
use DigitalStars\MtprotoClient\Generated\Types\Base\BusinessChatLink;
use DigitalStars\MtprotoClient\Generated\Types\Base\BusinessWorkHours;
use DigitalStars\MtprotoClient\Generated\Types\Base\CodeSettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\Document;
use DigitalStars\MtprotoClient\Generated\Types\Base\DocumentEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmailVerificationApple;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmailVerificationCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmailVerificationGoogle;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmailVerifyPurposeLoginChange;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmailVerifyPurposeLoginSetup;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmailVerifyPurposePassport;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiList;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiListNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiStatus;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiStatusCollectible;
use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiStatusEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\GlobalPrivacySettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBusinessAwayMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBusinessBotRecipients;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBusinessChatLink;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBusinessGreetingMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBusinessIntro;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChannelEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputDocumentEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputEmojiStatusCollectible;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFileBig;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFileStoryDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGeoPoint;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGeoPointEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputNotifyBroadcasts;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputNotifyChats;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputNotifyForumTopic;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputNotifyPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputNotifyUsers;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerNotifySettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPhotoEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyKey;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowAll;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowBots;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowChatParticipants;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowCloseFriends;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowContacts;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowPremium;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueAllowUsers;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueDisallowAll;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueDisallowBots;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueDisallowChatParticipants;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueDisallowContacts;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyValueDisallowUsers;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputSecureValue;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputTheme;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputThemeSettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputThemeSlug;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputWallPaperNoFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputWallPaperSlug;
use DigitalStars\MtprotoClient\Generated\Types\Base\PeerNotifySettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReactionsNotifySettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\ReportReason;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureCredentialsEncrypted;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValue;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValueHash;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValueType;
use DigitalStars\MtprotoClient\Generated\Types\Base\Theme;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShort;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortChatMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdateShortSentMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\Updates;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesCombined;
use DigitalStars\MtprotoClient\Generated\Types\Base\UpdatesTooLong;
use DigitalStars\MtprotoClient\Generated\Types\Base\User;
use DigitalStars\MtprotoClient\Generated\Types\Base\UserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\WallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\WallPaperNoFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\WallPaperSettings;


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
     * @return bool
     * @see https://core.telegram.org/method/account.registerDevice
     * @api
     */
    public function registerDevice(int $tokenType, string $token, bool $appSandbox, string $secret, array $otherUids, ?bool $noMuted = null): bool
    {
        return (bool) $this->client->callSync(new RegisterDeviceRequest($tokenType, $token, $appSandbox, $secret, $otherUids, $noMuted));
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
        return (bool) $this->client->callSync(new UnregisterDeviceRequest($tokenType, $token, $otherUids));
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
        return (bool) $this->client->callSync(new UpdateNotifySettingsRequest($peer, $settings));
    }

    /**
     * @param InputNotifyPeer|InputNotifyUsers|InputNotifyChats|InputNotifyBroadcasts|InputNotifyForumTopic $peer
     * @return PeerNotifySettings|null
     * @see https://core.telegram.org/method/account.getNotifySettings
     * @api
     */
    public function getNotifySettings(AbstractInputNotifyPeer $peer): ?PeerNotifySettings
    {
        return $this->client->callSync(new GetNotifySettingsRequest($peer));
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.resetNotifySettings
     * @api
     */
    public function resetNotifySettings(): bool
    {
        return (bool) $this->client->callSync(new ResetNotifySettingsRequest());
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
        return $this->client->callSync(new UpdateProfileRequest($firstName, $lastName, $about));
    }

    /**
     * @param bool $offline
     * @return bool
     * @see https://core.telegram.org/method/account.updateStatus
     * @api
     */
    public function updateStatus(bool $offline): bool
    {
        return (bool) $this->client->callSync(new UpdateStatusRequest($offline));
    }

    /**
     * @param int $hash
     * @return WallPapersNotModified|WallPapers|null
     * @see https://core.telegram.org/method/account.getWallPapers
     * @api
     */
    public function getWallPapers(int $hash): ?AbstractWallPapers
    {
        return $this->client->callSync(new GetWallPapersRequest($hash));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param ReportReason $reason
     * @param string $message
     * @return bool
     * @see https://core.telegram.org/method/account.reportPeer
     * @api
     */
    public function reportPeer(AbstractInputPeer $peer, ReportReason $reason, string $message): bool
    {
        return (bool) $this->client->callSync(new ReportPeerRequest($peer, $reason, $message));
    }

    /**
     * @param string $username
     * @return bool
     * @see https://core.telegram.org/method/account.checkUsername
     * @api
     */
    public function checkUsername(string $username): bool
    {
        return (bool) $this->client->callSync(new CheckUsernameRequest($username));
    }

    /**
     * @param string $username
     * @return UserEmpty|User|null
     * @see https://core.telegram.org/method/account.updateUsername
     * @api
     */
    public function updateUsername(string $username): ?AbstractUser
    {
        return $this->client->callSync(new UpdateUsernameRequest($username));
    }

    /**
     * @param InputPrivacyKey $key
     * @return PrivacyRules|null
     * @see https://core.telegram.org/method/account.getPrivacy
     * @api
     */
    public function getPrivacy(InputPrivacyKey $key): ?PrivacyRules
    {
        return $this->client->callSync(new GetPrivacyRequest($key));
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
        return $this->client->callSync(new SetPrivacyRequest($key, $rules));
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
        return (bool) $this->client->callSync(new DeleteAccountRequest($reason, $password));
    }

    /**
     * @return AccountDaysTTL|null
     * @see https://core.telegram.org/method/account.getAccountTTL
     * @api
     */
    public function getAccountTTL(): ?AccountDaysTTL
    {
        return $this->client->callSync(new GetAccountTTLRequest());
    }

    /**
     * @param AccountDaysTTL $ttl
     * @return bool
     * @see https://core.telegram.org/method/account.setAccountTTL
     * @api
     */
    public function setAccountTTL(AccountDaysTTL $ttl): bool
    {
        return (bool) $this->client->callSync(new SetAccountTTLRequest($ttl));
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
        return $this->client->callSync(new SendChangePhoneCodeRequest($phoneNumber, $settings));
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
        return $this->client->callSync(new ChangePhoneRequest($phoneNumber, $phoneCodeHash, $phoneCode));
    }

    /**
     * @param int $period
     * @return bool
     * @see https://core.telegram.org/method/account.updateDeviceLocked
     * @api
     */
    public function updateDeviceLocked(int $period): bool
    {
        return (bool) $this->client->callSync(new UpdateDeviceLockedRequest($period));
    }

    /**
     * @return Authorizations|null
     * @see https://core.telegram.org/method/account.getAuthorizations
     * @api
     */
    public function getAuthorizations(): ?Authorizations
    {
        return $this->client->callSync(new GetAuthorizationsRequest());
    }

    /**
     * @param int $hash
     * @return bool
     * @see https://core.telegram.org/method/account.resetAuthorization
     * @api
     */
    public function resetAuthorization(int $hash): bool
    {
        return (bool) $this->client->callSync(new ResetAuthorizationRequest($hash));
    }

    /**
     * @return Password|null
     * @see https://core.telegram.org/method/account.getPassword
     * @api
     */
    public function getPassword(): ?Password
    {
        return $this->client->callSync(new GetPasswordRequest());
    }

    /**
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return PasswordSettings|null
     * @see https://core.telegram.org/method/account.getPasswordSettings
     * @api
     */
    public function getPasswordSettings(AbstractInputCheckPasswordSRP $password): ?PasswordSettings
    {
        return $this->client->callSync(new GetPasswordSettingsRequest($password));
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
        return (bool) $this->client->callSync(new UpdatePasswordSettingsRequest($password, $newSettings));
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
        return $this->client->callSync(new SendConfirmPhoneCodeRequest($hash, $settings));
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
        return (bool) $this->client->callSync(new ConfirmPhoneRequest($phoneCodeHash, $phoneCode));
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
        return $this->client->callSync(new GetTmpPasswordRequest($password, $period));
    }

    /**
     * @return WebAuthorizations|null
     * @see https://core.telegram.org/method/account.getWebAuthorizations
     * @api
     */
    public function getWebAuthorizations(): ?WebAuthorizations
    {
        return $this->client->callSync(new GetWebAuthorizationsRequest());
    }

    /**
     * @param int $hash
     * @return bool
     * @see https://core.telegram.org/method/account.resetWebAuthorization
     * @api
     */
    public function resetWebAuthorization(int $hash): bool
    {
        return (bool) $this->client->callSync(new ResetWebAuthorizationRequest($hash));
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.resetWebAuthorizations
     * @api
     */
    public function resetWebAuthorizations(): bool
    {
        return (bool) $this->client->callSync(new ResetWebAuthorizationsRequest());
    }

    /**
     * @return list<SecureValue>
     * @see https://core.telegram.org/method/account.getAllSecureValues
     * @api
     */
    public function getAllSecureValues(): array
    {
        return $this->client->callSync(new GetAllSecureValuesRequest());
    }

    /**
     * @param list<SecureValueType> $types
     * @return list<SecureValue>
     * @see https://core.telegram.org/method/account.getSecureValue
     * @api
     */
    public function getSecureValue(array $types): array
    {
        return $this->client->callSync(new GetSecureValueRequest($types));
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
        return $this->client->callSync(new SaveSecureValueRequest($value, $secureSecretId));
    }

    /**
     * @param list<SecureValueType> $types
     * @return bool
     * @see https://core.telegram.org/method/account.deleteSecureValue
     * @api
     */
    public function deleteSecureValue(array $types): bool
    {
        return (bool) $this->client->callSync(new DeleteSecureValueRequest($types));
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
        return $this->client->callSync(new GetAuthorizationFormRequest($botId, $scope, $publicKey));
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
        return (bool) $this->client->callSync(new AcceptAuthorizationRequest($botId, $scope, $publicKey, $valueHashes, $credentials));
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
        return $this->client->callSync(new SendVerifyPhoneCodeRequest($phoneNumber, $settings));
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
        return (bool) $this->client->callSync(new VerifyPhoneRequest($phoneNumber, $phoneCodeHash, $phoneCode));
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
        return $this->client->callSync(new SendVerifyEmailCodeRequest($purpose, $email));
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
        return $this->client->callSync(new VerifyEmailRequest($purpose, $verification));
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
        return $this->client->callSync(new InitTakeoutSessionRequest($contacts, $messageUsers, $messageChats, $messageMegagroups, $messageChannels, $files, $fileMaxSize));
    }

    /**
     * @param bool|null $success
     * @return bool
     * @see https://core.telegram.org/method/account.finishTakeoutSession
     * @api
     */
    public function finishTakeoutSession(?bool $success = null): bool
    {
        return (bool) $this->client->callSync(new FinishTakeoutSessionRequest($success));
    }

    /**
     * @param string $code
     * @return bool
     * @see https://core.telegram.org/method/account.confirmPasswordEmail
     * @api
     */
    public function confirmPasswordEmail(string $code): bool
    {
        return (bool) $this->client->callSync(new ConfirmPasswordEmailRequest($code));
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.resendPasswordEmail
     * @api
     */
    public function resendPasswordEmail(): bool
    {
        return (bool) $this->client->callSync(new ResendPasswordEmailRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.cancelPasswordEmail
     * @api
     */
    public function cancelPasswordEmail(): bool
    {
        return (bool) $this->client->callSync(new CancelPasswordEmailRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.getContactSignUpNotification
     * @api
     */
    public function getContactSignUpNotification(): bool
    {
        return (bool) $this->client->callSync(new GetContactSignUpNotificationRequest());
    }

    /**
     * @param bool $silent
     * @return bool
     * @see https://core.telegram.org/method/account.setContactSignUpNotification
     * @api
     */
    public function setContactSignUpNotification(bool $silent): bool
    {
        return (bool) $this->client->callSync(new SetContactSignUpNotificationRequest($silent));
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
        return $this->client->callSync(new GetNotifyExceptionsRequest($compareSound, $compareStories, $peer));
    }

    /**
     * @param InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile $wallpaper
     * @return WallPaper|WallPaperNoFile|null
     * @see https://core.telegram.org/method/account.getWallPaper
     * @api
     */
    public function getWallPaper(AbstractInputWallPaper $wallpaper): ?AbstractWallPaper
    {
        return $this->client->callSync(new GetWallPaperRequest($wallpaper));
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
        return $this->client->callSync(new UploadWallPaperRequest($file, $mimeType, $settings, $forChat));
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
        return (bool) $this->client->callSync(new SaveWallPaperRequest($wallpaper, $unsave, $settings));
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
        return (bool) $this->client->callSync(new InstallWallPaperRequest($wallpaper, $settings));
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.resetWallPapers
     * @api
     */
    public function resetWallPapers(): bool
    {
        return (bool) $this->client->callSync(new ResetWallPapersRequest());
    }

    /**
     * @return AutoDownloadSettings|null
     * @see https://core.telegram.org/method/account.getAutoDownloadSettings
     * @api
     */
    public function getAutoDownloadSettings(): ?AutoDownloadSettings
    {
        return $this->client->callSync(new GetAutoDownloadSettingsRequest());
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
        return (bool) $this->client->callSync(new SaveAutoDownloadSettingsRequest($settings, $low, $high));
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
        return $this->client->callSync(new UploadThemeRequest($file, $fileName, $mimeType, $thumb));
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
        return $this->client->callSync(new CreateThemeRequest($slug, $title, $document, $settings));
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
        return $this->client->callSync(new UpdateThemeRequest($format, $theme, $slug, $title, $document, $settings));
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
        return (bool) $this->client->callSync(new SaveThemeRequest($theme, $unsave));
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
        return (bool) $this->client->callSync(new InstallThemeRequest($dark, $theme, $format, $baseTheme));
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
        return $this->client->callSync(new GetThemeRequest($format, $theme));
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
        return $this->client->callSync(new GetThemesRequest($format, $hash));
    }

    /**
     * @param bool|null $sensitiveEnabled
     * @return bool
     * @see https://core.telegram.org/method/account.setContentSettings
     * @api
     */
    public function setContentSettings(?bool $sensitiveEnabled = null): bool
    {
        return (bool) $this->client->callSync(new SetContentSettingsRequest($sensitiveEnabled));
    }

    /**
     * @return ContentSettings|null
     * @see https://core.telegram.org/method/account.getContentSettings
     * @api
     */
    public function getContentSettings(): ?ContentSettings
    {
        return $this->client->callSync(new GetContentSettingsRequest());
    }

    /**
     * @param list<InputWallPaper|InputWallPaperSlug|InputWallPaperNoFile> $wallpapers
     * @return list<WallPaper|WallPaperNoFile>
     * @see https://core.telegram.org/method/account.getMultiWallPapers
     * @api
     */
    public function getMultiWallPapers(array $wallpapers): array
    {
        return $this->client->callSync(new GetMultiWallPapersRequest($wallpapers));
    }

    /**
     * @return GlobalPrivacySettings|null
     * @see https://core.telegram.org/method/account.getGlobalPrivacySettings
     * @api
     */
    public function getGlobalPrivacySettings(): ?GlobalPrivacySettings
    {
        return $this->client->callSync(new GetGlobalPrivacySettingsRequest());
    }

    /**
     * @param GlobalPrivacySettings $settings
     * @return GlobalPrivacySettings|null
     * @see https://core.telegram.org/method/account.setGlobalPrivacySettings
     * @api
     */
    public function setGlobalPrivacySettings(GlobalPrivacySettings $settings): ?GlobalPrivacySettings
    {
        return $this->client->callSync(new SetGlobalPrivacySettingsRequest($settings));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputPhotoEmpty|InputPhoto $photoId
     * @param ReportReason $reason
     * @param string $message
     * @return bool
     * @see https://core.telegram.org/method/account.reportProfilePhoto
     * @api
     */
    public function reportProfilePhoto(AbstractInputPeer $peer, AbstractInputPhoto $photoId, ReportReason $reason, string $message): bool
    {
        return (bool) $this->client->callSync(new ReportProfilePhotoRequest($peer, $photoId, $reason, $message));
    }

    /**
     * @return ResetPasswordFailedWait|ResetPasswordRequestedWait|ResetPasswordOk|null
     * @see https://core.telegram.org/method/account.resetPassword
     * @api
     */
    public function resetPassword(): ?AbstractResetPasswordResult
    {
        return $this->client->callSync(new ResetPasswordRequest());
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.declinePasswordReset
     * @api
     */
    public function declinePasswordReset(): bool
    {
        return (bool) $this->client->callSync(new DeclinePasswordResetRequest());
    }

    /**
     * @param int $hash
     * @return ThemesNotModified|Themes|null
     * @see https://core.telegram.org/method/account.getChatThemes
     * @api
     */
    public function getChatThemes(int $hash): ?AbstractThemes
    {
        return $this->client->callSync(new GetChatThemesRequest($hash));
    }

    /**
     * @param int $authorizationTtlDays
     * @return bool
     * @see https://core.telegram.org/method/account.setAuthorizationTTL
     * @api
     */
    public function setAuthorizationTTL(int $authorizationTtlDays): bool
    {
        return (bool) $this->client->callSync(new SetAuthorizationTTLRequest($authorizationTtlDays));
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
        return (bool) $this->client->callSync(new ChangeAuthorizationSettingsRequest($hash, $confirmed, $encryptedRequestsDisabled, $callRequestsDisabled));
    }

    /**
     * @param int $hash
     * @return SavedRingtonesNotModified|SavedRingtones|null
     * @see https://core.telegram.org/method/account.getSavedRingtones
     * @api
     */
    public function getSavedRingtones(int $hash): ?AbstractSavedRingtones
    {
        return $this->client->callSync(new GetSavedRingtonesRequest($hash));
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
        return $this->client->callSync(new SaveRingtoneRequest($id, $unsave));
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
        return $this->client->callSync(new UploadRingtoneRequest($file, $fileName, $mimeType));
    }

    /**
     * @param EmojiStatusEmpty|EmojiStatus|EmojiStatusCollectible|InputEmojiStatusCollectible $emojiStatus
     * @return bool
     * @see https://core.telegram.org/method/account.updateEmojiStatus
     * @api
     */
    public function updateEmojiStatus(AbstractEmojiStatus $emojiStatus): bool
    {
        return (bool) $this->client->callSync(new UpdateEmojiStatusRequest($emojiStatus));
    }

    /**
     * @param int $hash
     * @return EmojiStatusesNotModified|EmojiStatuses|null
     * @see https://core.telegram.org/method/account.getDefaultEmojiStatuses
     * @api
     */
    public function getDefaultEmojiStatuses(int $hash): ?AbstractEmojiStatuses
    {
        return $this->client->callSync(new GetDefaultEmojiStatusesRequest($hash));
    }

    /**
     * @param int $hash
     * @return EmojiStatusesNotModified|EmojiStatuses|null
     * @see https://core.telegram.org/method/account.getRecentEmojiStatuses
     * @api
     */
    public function getRecentEmojiStatuses(int $hash): ?AbstractEmojiStatuses
    {
        return $this->client->callSync(new GetRecentEmojiStatusesRequest($hash));
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.clearRecentEmojiStatuses
     * @api
     */
    public function clearRecentEmojiStatuses(): bool
    {
        return (bool) $this->client->callSync(new ClearRecentEmojiStatusesRequest());
    }

    /**
     * @param list<string> $order
     * @return bool
     * @see https://core.telegram.org/method/account.reorderUsernames
     * @api
     */
    public function reorderUsernames(array $order): bool
    {
        return (bool) $this->client->callSync(new ReorderUsernamesRequest($order));
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
        return (bool) $this->client->callSync(new ToggleUsernameRequest($username, $active));
    }

    /**
     * @param int $hash
     * @return EmojiListNotModified|EmojiList|null
     * @see https://core.telegram.org/method/account.getDefaultProfilePhotoEmojis
     * @api
     */
    public function getDefaultProfilePhotoEmojis(int $hash): ?AbstractEmojiList
    {
        return $this->client->callSync(new GetDefaultProfilePhotoEmojisRequest($hash));
    }

    /**
     * @param int $hash
     * @return EmojiListNotModified|EmojiList|null
     * @see https://core.telegram.org/method/account.getDefaultGroupPhotoEmojis
     * @api
     */
    public function getDefaultGroupPhotoEmojis(int $hash): ?AbstractEmojiList
    {
        return $this->client->callSync(new GetDefaultGroupPhotoEmojisRequest($hash));
    }

    /**
     * @return AutoSaveSettings|null
     * @see https://core.telegram.org/method/account.getAutoSaveSettings
     * @api
     */
    public function getAutoSaveSettings(): ?AutoSaveSettings
    {
        return $this->client->callSync(new GetAutoSaveSettingsRequest());
    }

    /**
     * @param BaseAutoSaveSettings $settings
     * @param bool|null $users
     * @param bool|null $chats
     * @param bool|null $broadcasts
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $peer
     * @return bool
     * @see https://core.telegram.org/method/account.saveAutoSaveSettings
     * @api
     */
    public function saveAutoSaveSettings(BaseAutoSaveSettings $settings, ?bool $users = null, ?bool $chats = null, ?bool $broadcasts = null, ?AbstractInputPeer $peer = null): bool
    {
        return (bool) $this->client->callSync(new SaveAutoSaveSettingsRequest($settings, $users, $chats, $broadcasts, $peer));
    }

    /**
     * @return bool
     * @see https://core.telegram.org/method/account.deleteAutoSaveExceptions
     * @api
     */
    public function deleteAutoSaveExceptions(): bool
    {
        return (bool) $this->client->callSync(new DeleteAutoSaveExceptionsRequest());
    }

    /**
     * @param list<string> $codes
     * @return bool
     * @see https://core.telegram.org/method/account.invalidateSignInCodes
     * @api
     */
    public function invalidateSignInCodes(array $codes): bool
    {
        return (bool) $this->client->callSync(new InvalidateSignInCodesRequest($codes));
    }

    /**
     * @param bool|null $forProfile
     * @param int|null $color
     * @param int|null $backgroundEmojiId
     * @return bool
     * @see https://core.telegram.org/method/account.updateColor
     * @api
     */
    public function updateColor(?bool $forProfile = null, ?int $color = null, ?int $backgroundEmojiId = null): bool
    {
        return (bool) $this->client->callSync(new UpdateColorRequest($forProfile, $color, $backgroundEmojiId));
    }

    /**
     * @param int $hash
     * @return EmojiListNotModified|EmojiList|null
     * @see https://core.telegram.org/method/account.getDefaultBackgroundEmojis
     * @api
     */
    public function getDefaultBackgroundEmojis(int $hash): ?AbstractEmojiList
    {
        return $this->client->callSync(new GetDefaultBackgroundEmojisRequest($hash));
    }

    /**
     * @param int $hash
     * @return EmojiStatusesNotModified|EmojiStatuses|null
     * @see https://core.telegram.org/method/account.getChannelDefaultEmojiStatuses
     * @api
     */
    public function getChannelDefaultEmojiStatuses(int $hash): ?AbstractEmojiStatuses
    {
        return $this->client->callSync(new GetChannelDefaultEmojiStatusesRequest($hash));
    }

    /**
     * @param int $hash
     * @return EmojiListNotModified|EmojiList|null
     * @see https://core.telegram.org/method/account.getChannelRestrictedStatusEmojis
     * @api
     */
    public function getChannelRestrictedStatusEmojis(int $hash): ?AbstractEmojiList
    {
        return $this->client->callSync(new GetChannelRestrictedStatusEmojisRequest($hash));
    }

    /**
     * @param BusinessWorkHours|null $businessWorkHours
     * @return bool
     * @see https://core.telegram.org/method/account.updateBusinessWorkHours
     * @api
     */
    public function updateBusinessWorkHours(?BusinessWorkHours $businessWorkHours = null): bool
    {
        return (bool) $this->client->callSync(new UpdateBusinessWorkHoursRequest($businessWorkHours));
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
        return (bool) $this->client->callSync(new UpdateBusinessLocationRequest($geoPoint, $address));
    }

    /**
     * @param InputBusinessGreetingMessage|null $message
     * @return bool
     * @see https://core.telegram.org/method/account.updateBusinessGreetingMessage
     * @api
     */
    public function updateBusinessGreetingMessage(?InputBusinessGreetingMessage $message = null): bool
    {
        return (bool) $this->client->callSync(new UpdateBusinessGreetingMessageRequest($message));
    }

    /**
     * @param InputBusinessAwayMessage|null $message
     * @return bool
     * @see https://core.telegram.org/method/account.updateBusinessAwayMessage
     * @api
     */
    public function updateBusinessAwayMessage(?InputBusinessAwayMessage $message = null): bool
    {
        return (bool) $this->client->callSync(new UpdateBusinessAwayMessageRequest($message));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $bot
     * @param InputBusinessBotRecipients $recipients
     * @param bool|null $deleted
     * @param BusinessBotRights|null $rights
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/account.updateConnectedBot
     * @api
     */
    public function updateConnectedBot(AbstractInputUser $bot, InputBusinessBotRecipients $recipients, ?bool $deleted = null, ?BusinessBotRights $rights = null): ?AbstractUpdates
    {
        return $this->client->callSync(new UpdateConnectedBotRequest($bot, $recipients, $deleted, $rights));
    }

    /**
     * @return ConnectedBots|null
     * @see https://core.telegram.org/method/account.getConnectedBots
     * @api
     */
    public function getConnectedBots(): ?ConnectedBots
    {
        return $this->client->callSync(new GetConnectedBotsRequest());
    }

    /**
     * @param string $connectionId
     * @return UpdatesTooLong|UpdateShortMessage|UpdateShortChatMessage|UpdateShort|UpdatesCombined|Updates|UpdateShortSentMessage|null
     * @see https://core.telegram.org/method/account.getBotBusinessConnection
     * @api
     */
    public function getBotBusinessConnection(string $connectionId): ?AbstractUpdates
    {
        return $this->client->callSync(new GetBotBusinessConnectionRequest($connectionId));
    }

    /**
     * @param InputBusinessIntro|null $intro
     * @return bool
     * @see https://core.telegram.org/method/account.updateBusinessIntro
     * @api
     */
    public function updateBusinessIntro(?InputBusinessIntro $intro = null): bool
    {
        return (bool) $this->client->callSync(new UpdateBusinessIntroRequest($intro));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param bool $paused
     * @return bool
     * @see https://core.telegram.org/method/account.toggleConnectedBotPaused
     * @api
     */
    public function toggleConnectedBotPaused(AbstractInputPeer $peer, bool $paused): bool
    {
        return (bool) $this->client->callSync(new ToggleConnectedBotPausedRequest($peer, $paused));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return bool
     * @see https://core.telegram.org/method/account.disablePeerConnectedBot
     * @api
     */
    public function disablePeerConnectedBot(AbstractInputPeer $peer): bool
    {
        return (bool) $this->client->callSync(new DisablePeerConnectedBotRequest($peer));
    }

    /**
     * @param Birthday|null $birthday
     * @return bool
     * @see https://core.telegram.org/method/account.updateBirthday
     * @api
     */
    public function updateBirthday(?Birthday $birthday = null): bool
    {
        return (bool) $this->client->callSync(new UpdateBirthdayRequest($birthday));
    }

    /**
     * @param InputBusinessChatLink $link
     * @return BusinessChatLink|null
     * @see https://core.telegram.org/method/account.createBusinessChatLink
     * @api
     */
    public function createBusinessChatLink(InputBusinessChatLink $link): ?BusinessChatLink
    {
        return $this->client->callSync(new CreateBusinessChatLinkRequest($link));
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
        return $this->client->callSync(new EditBusinessChatLinkRequest($slug, $link));
    }

    /**
     * @param string $slug
     * @return bool
     * @see https://core.telegram.org/method/account.deleteBusinessChatLink
     * @api
     */
    public function deleteBusinessChatLink(string $slug): bool
    {
        return (bool) $this->client->callSync(new DeleteBusinessChatLinkRequest($slug));
    }

    /**
     * @return BusinessChatLinks|null
     * @see https://core.telegram.org/method/account.getBusinessChatLinks
     * @api
     */
    public function getBusinessChatLinks(): ?BusinessChatLinks
    {
        return $this->client->callSync(new GetBusinessChatLinksRequest());
    }

    /**
     * @param string $slug
     * @return ResolvedBusinessChatLinks|null
     * @see https://core.telegram.org/method/account.resolveBusinessChatLink
     * @api
     */
    public function resolveBusinessChatLink(string $slug): ?ResolvedBusinessChatLinks
    {
        return $this->client->callSync(new ResolveBusinessChatLinkRequest($slug));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @return bool
     * @see https://core.telegram.org/method/account.updatePersonalChannel
     * @api
     */
    public function updatePersonalChannel(AbstractInputChannel $channel): bool
    {
        return (bool) $this->client->callSync(new UpdatePersonalChannelRequest($channel));
    }

    /**
     * @param bool $enabled
     * @return bool
     * @see https://core.telegram.org/method/account.toggleSponsoredMessages
     * @api
     */
    public function toggleSponsoredMessages(bool $enabled): bool
    {
        return (bool) $this->client->callSync(new ToggleSponsoredMessagesRequest($enabled));
    }

    /**
     * @return ReactionsNotifySettings|null
     * @see https://core.telegram.org/method/account.getReactionsNotifySettings
     * @api
     */
    public function getReactionsNotifySettings(): ?ReactionsNotifySettings
    {
        return $this->client->callSync(new GetReactionsNotifySettingsRequest());
    }

    /**
     * @param ReactionsNotifySettings $settings
     * @return ReactionsNotifySettings|null
     * @see https://core.telegram.org/method/account.setReactionsNotifySettings
     * @api
     */
    public function setReactionsNotifySettings(ReactionsNotifySettings $settings): ?ReactionsNotifySettings
    {
        return $this->client->callSync(new SetReactionsNotifySettingsRequest($settings));
    }

    /**
     * @param int $hash
     * @return EmojiStatusesNotModified|EmojiStatuses|null
     * @see https://core.telegram.org/method/account.getCollectibleEmojiStatuses
     * @api
     */
    public function getCollectibleEmojiStatuses(int $hash): ?AbstractEmojiStatuses
    {
        return $this->client->callSync(new GetCollectibleEmojiStatusesRequest($hash));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $parentPeer
     * @return PaidMessagesRevenue|null
     * @see https://core.telegram.org/method/account.getPaidMessagesRevenue
     * @api
     */
    public function getPaidMessagesRevenue(AbstractInputUser $userId, ?AbstractInputPeer $parentPeer = null): ?PaidMessagesRevenue
    {
        return $this->client->callSync(new GetPaidMessagesRevenueRequest($userId, $parentPeer));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param bool|null $refundCharged
     * @param bool|null $requirePayment
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|null $parentPeer
     * @return bool
     * @see https://core.telegram.org/method/account.toggleNoPaidMessagesException
     * @api
     */
    public function toggleNoPaidMessagesException(AbstractInputUser $userId, ?bool $refundCharged = null, ?bool $requirePayment = null, ?AbstractInputPeer $parentPeer = null): bool
    {
        return (bool) $this->client->callSync(new ToggleNoPaidMessagesExceptionRequest($userId, $refundCharged, $requirePayment, $parentPeer));
    }
}