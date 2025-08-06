<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Help\AcceptTermsOfServiceRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\DismissSuggestionRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\EditUserInfoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetAppConfigRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetAppUpdateRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetCdnConfigRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetConfigRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetCountriesListRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetDeepLinkInfoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetInviteTextRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetNearestDcRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetPassportConfigRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetPeerColorsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetPeerProfileColorsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetPremiumPromoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetPromoDataRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetRecentMeUrlsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetSupportNameRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetSupportRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetTermsOfServiceUpdateRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetTimezonesListRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\GetUserInfoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\HidePromoDataRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\SaveAppLogRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Help\SetBotUpdatesStatusRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Base\CdnConfig;
use DigitalStars\MtprotoClient\Generated\Types\Base\Config;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputAppEvent;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputMessageEntityMentionName;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityBankCard;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityBlockquote;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityBold;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityBotCommand;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityCashtag;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityCustomEmoji;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityEmail;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityHashtag;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityItalic;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityMention;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityMentionName;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityPhone;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityPre;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntitySpoiler;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityStrike;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityTextUrl;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityUnderline;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityUnknown;
use DigitalStars\MtprotoClient\Generated\Types\Base\MessageEntityUrl;
use DigitalStars\MtprotoClient\Generated\Types\Base\NearestDc;
use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractAppConfig;
use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractAppUpdate;
use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractCountriesList;
use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractDeepLinkInfo;
use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractPassportConfig;
use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractPeerColors;
use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractPromoData;
use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractTermsOfServiceUpdate;
use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractTimezonesList;
use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractUserInfo;
use DigitalStars\MtprotoClient\Generated\Types\Help\AppConfig;
use DigitalStars\MtprotoClient\Generated\Types\Help\AppConfigNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Help\AppUpdate;
use DigitalStars\MtprotoClient\Generated\Types\Help\CountriesList;
use DigitalStars\MtprotoClient\Generated\Types\Help\CountriesListNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Help\DeepLinkInfo;
use DigitalStars\MtprotoClient\Generated\Types\Help\DeepLinkInfoEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Help\InviteText;
use DigitalStars\MtprotoClient\Generated\Types\Help\NoAppUpdate;
use DigitalStars\MtprotoClient\Generated\Types\Help\PassportConfig;
use DigitalStars\MtprotoClient\Generated\Types\Help\PassportConfigNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Help\PeerColors;
use DigitalStars\MtprotoClient\Generated\Types\Help\PeerColorsNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Help\PremiumPromo;
use DigitalStars\MtprotoClient\Generated\Types\Help\PromoData;
use DigitalStars\MtprotoClient\Generated\Types\Help\PromoDataEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Help\RecentMeUrls;
use DigitalStars\MtprotoClient\Generated\Types\Help\Support;
use DigitalStars\MtprotoClient\Generated\Types\Help\SupportName;
use DigitalStars\MtprotoClient\Generated\Types\Help\TermsOfServiceUpdate;
use DigitalStars\MtprotoClient\Generated\Types\Help\TermsOfServiceUpdateEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Help\TimezonesList;
use DigitalStars\MtprotoClient\Generated\Types\Help\TimezonesListNotModified;
use DigitalStars\MtprotoClient\Generated\Types\Help\UserInfo;
use DigitalStars\MtprotoClient\Generated\Types\Help\UserInfoEmpty;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "help" group.
 */
final readonly class HelpMethods
{
    public function __construct(private Client $client) {}

    /**
     * @return Config|null
     * @see https://core.telegram.org/method/help.getConfig
     * @api
     */
    public function getConfig(): ?Config
    {
        return $this->client->callSync(new GetConfigRequest());
    }

    /**
     * @return NearestDc|null
     * @see https://core.telegram.org/method/help.getNearestDc
     * @api
     */
    public function getNearestDc(): ?NearestDc
    {
        return $this->client->callSync(new GetNearestDcRequest());
    }

    /**
     * @param string $source
     * @return AppUpdate|NoAppUpdate|null
     * @see https://core.telegram.org/method/help.getAppUpdate
     * @api
     */
    public function getAppUpdate(string $source): ?AbstractAppUpdate
    {
        return $this->client->callSync(new GetAppUpdateRequest($source));
    }

    /**
     * @return InviteText|null
     * @see https://core.telegram.org/method/help.getInviteText
     * @api
     */
    public function getInviteText(): ?InviteText
    {
        return $this->client->callSync(new GetInviteTextRequest());
    }

    /**
     * @return Support|null
     * @see https://core.telegram.org/method/help.getSupport
     * @api
     */
    public function getSupport(): ?Support
    {
        return $this->client->callSync(new GetSupportRequest());
    }

    /**
     * @param int $pendingUpdatesCount
     * @param string $message
     * @return bool
     * @see https://core.telegram.org/method/help.setBotUpdatesStatus
     * @api
     */
    public function setBotUpdatesStatus(int $pendingUpdatesCount, string $message): bool
    {
        return (bool) $this->client->callSync(new SetBotUpdatesStatusRequest($pendingUpdatesCount, $message));
    }

    /**
     * @return CdnConfig|null
     * @see https://core.telegram.org/method/help.getCdnConfig
     * @api
     */
    public function getCdnConfig(): ?CdnConfig
    {
        return $this->client->callSync(new GetCdnConfigRequest());
    }

    /**
     * @param string $referer
     * @return RecentMeUrls|null
     * @see https://core.telegram.org/method/help.getRecentMeUrls
     * @api
     */
    public function getRecentMeUrls(string $referer): ?RecentMeUrls
    {
        return $this->client->callSync(new GetRecentMeUrlsRequest($referer));
    }

    /**
     * @return TermsOfServiceUpdateEmpty|TermsOfServiceUpdate|null
     * @see https://core.telegram.org/method/help.getTermsOfServiceUpdate
     * @api
     */
    public function getTermsOfServiceUpdate(): ?AbstractTermsOfServiceUpdate
    {
        return $this->client->callSync(new GetTermsOfServiceUpdateRequest());
    }

    /**
     * @param array $id
     * @return bool
     * @see https://core.telegram.org/method/help.acceptTermsOfService
     * @api
     */
    public function acceptTermsOfService(array $id): bool
    {
        return (bool) $this->client->callSync(new AcceptTermsOfServiceRequest($id));
    }

    /**
     * @param string $path
     * @return DeepLinkInfoEmpty|DeepLinkInfo|null
     * @see https://core.telegram.org/method/help.getDeepLinkInfo
     * @api
     */
    public function getDeepLinkInfo(string $path): ?AbstractDeepLinkInfo
    {
        return $this->client->callSync(new GetDeepLinkInfoRequest($path));
    }

    /**
     * @param int $hash
     * @return AppConfigNotModified|AppConfig|null
     * @see https://core.telegram.org/method/help.getAppConfig
     * @api
     */
    public function getAppConfig(int $hash): ?AbstractAppConfig
    {
        return $this->client->callSync(new GetAppConfigRequest($hash));
    }

    /**
     * @param list<InputAppEvent> $events
     * @return bool
     * @see https://core.telegram.org/method/help.saveAppLog
     * @api
     */
    public function saveAppLog(array $events): bool
    {
        return (bool) $this->client->callSync(new SaveAppLogRequest($events));
    }

    /**
     * @param int $hash
     * @return PassportConfigNotModified|PassportConfig|null
     * @see https://core.telegram.org/method/help.getPassportConfig
     * @api
     */
    public function getPassportConfig(int $hash): ?AbstractPassportConfig
    {
        return $this->client->callSync(new GetPassportConfigRequest($hash));
    }

    /**
     * @return SupportName|null
     * @see https://core.telegram.org/method/help.getSupportName
     * @api
     */
    public function getSupportName(): ?SupportName
    {
        return $this->client->callSync(new GetSupportNameRequest());
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @return UserInfoEmpty|UserInfo|null
     * @see https://core.telegram.org/method/help.getUserInfo
     * @api
     */
    public function getUserInfo(AbstractInputUser $userId): ?AbstractUserInfo
    {
        return $this->client->callSync(new GetUserInfoRequest($userId));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param string $message
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote> $entities
     * @return UserInfoEmpty|UserInfo|null
     * @see https://core.telegram.org/method/help.editUserInfo
     * @api
     */
    public function editUserInfo(AbstractInputUser $userId, string $message, array $entities): ?AbstractUserInfo
    {
        return $this->client->callSync(new EditUserInfoRequest($userId, $message, $entities));
    }

    /**
     * @return PromoDataEmpty|PromoData|null
     * @see https://core.telegram.org/method/help.getPromoData
     * @api
     */
    public function getPromoData(): ?AbstractPromoData
    {
        return $this->client->callSync(new GetPromoDataRequest());
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return bool
     * @see https://core.telegram.org/method/help.hidePromoData
     * @api
     */
    public function hidePromoData(AbstractInputPeer $peer): bool
    {
        return (bool) $this->client->callSync(new HidePromoDataRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $suggestion
     * @return bool
     * @see https://core.telegram.org/method/help.dismissSuggestion
     * @api
     */
    public function dismissSuggestion(AbstractInputPeer $peer, string $suggestion): bool
    {
        return (bool) $this->client->callSync(new DismissSuggestionRequest($peer, $suggestion));
    }

    /**
     * @param string $langCode
     * @param int $hash
     * @return CountriesListNotModified|CountriesList|null
     * @see https://core.telegram.org/method/help.getCountriesList
     * @api
     */
    public function getCountriesList(string $langCode, int $hash): ?AbstractCountriesList
    {
        return $this->client->callSync(new GetCountriesListRequest($langCode, $hash));
    }

    /**
     * @return PremiumPromo|null
     * @see https://core.telegram.org/method/help.getPremiumPromo
     * @api
     */
    public function getPremiumPromo(): ?PremiumPromo
    {
        return $this->client->callSync(new GetPremiumPromoRequest());
    }

    /**
     * @param int $hash
     * @return PeerColorsNotModified|PeerColors|null
     * @see https://core.telegram.org/method/help.getPeerColors
     * @api
     */
    public function getPeerColors(int $hash): ?AbstractPeerColors
    {
        return $this->client->callSync(new GetPeerColorsRequest($hash));
    }

    /**
     * @param int $hash
     * @return PeerColorsNotModified|PeerColors|null
     * @see https://core.telegram.org/method/help.getPeerProfileColors
     * @api
     */
    public function getPeerProfileColors(int $hash): ?AbstractPeerColors
    {
        return $this->client->callSync(new GetPeerProfileColorsRequest($hash));
    }

    /**
     * @param int $hash
     * @return TimezonesListNotModified|TimezonesList|null
     * @see https://core.telegram.org/method/help.getTimezonesList
     * @api
     */
    public function getTimezonesList(int $hash): ?AbstractTimezonesList
    {
        return $this->client->callSync(new GetTimezonesListRequest($hash));
    }
}