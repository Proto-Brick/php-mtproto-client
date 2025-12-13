<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\AcceptTermsOfServiceRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\DismissSuggestionRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\EditUserInfoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetAppConfigRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetAppUpdateRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetCdnConfigRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetConfigRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetCountriesListRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetDeepLinkInfoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetInviteTextRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetNearestDcRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetPassportConfigRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetPeerColorsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetPeerProfileColorsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetPremiumPromoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetPromoDataRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetRecentMeUrlsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetSupportNameRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetSupportRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetTermsOfServiceUpdateRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetTimezonesListRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\GetUserInfoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\HidePromoDataRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\SaveAppLogRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Help\SetBotUpdatesStatusRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\Generated\Types\Base\CdnConfig;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Config;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputAppEvent;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputMessageEntityMentionName;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityBankCard;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityBlockquote;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityBold;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityBotCommand;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityCashtag;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityCode;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityCustomEmoji;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityEmail;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityHashtag;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityItalic;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityMention;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityMentionName;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityPhone;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityPre;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntitySpoiler;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityStrike;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityTextUrl;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityUnderline;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityUnknown;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageEntityUrl;
use ProtoBrick\MTProtoClient\Generated\Types\Base\NearestDc;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractAppConfig;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractAppUpdate;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractCountriesList;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractDeepLinkInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractPassportConfig;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractPeerColors;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractPromoData;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractTermsOfServiceUpdate;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractTimezonesList;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractUserInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AppConfig;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AppConfigNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Help\AppUpdate;
use ProtoBrick\MTProtoClient\Generated\Types\Help\CountriesList;
use ProtoBrick\MTProtoClient\Generated\Types\Help\CountriesListNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Help\DeepLinkInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Help\DeepLinkInfoEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Help\InviteText;
use ProtoBrick\MTProtoClient\Generated\Types\Help\NoAppUpdate;
use ProtoBrick\MTProtoClient\Generated\Types\Help\PassportConfig;
use ProtoBrick\MTProtoClient\Generated\Types\Help\PassportConfigNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Help\PeerColors;
use ProtoBrick\MTProtoClient\Generated\Types\Help\PeerColorsNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Help\PremiumPromo;
use ProtoBrick\MTProtoClient\Generated\Types\Help\PromoData;
use ProtoBrick\MTProtoClient\Generated\Types\Help\PromoDataEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Help\RecentMeUrls;
use ProtoBrick\MTProtoClient\Generated\Types\Help\Support;
use ProtoBrick\MTProtoClient\Generated\Types\Help\SupportName;
use ProtoBrick\MTProtoClient\Generated\Types\Help\TermsOfServiceUpdate;
use ProtoBrick\MTProtoClient\Generated\Types\Help\TermsOfServiceUpdateEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Help\TimezonesList;
use ProtoBrick\MTProtoClient\Generated\Types\Help\TimezonesListNotModified;
use ProtoBrick\MTProtoClient\Generated\Types\Help\UserInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Help\UserInfoEmpty;


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
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @return UserInfoEmpty|UserInfo|null
     * @see https://core.telegram.org/method/help.getUserInfo
     * @api
     */
    public function getUserInfo(AbstractInputUser|string|int $userId): ?AbstractUserInfo
    {
        if (is_string($userId) || is_int($userId)) {
            $userId = $this->client->peerManager->resolve($userId);
        }
        return $this->client->callSync(new GetUserInfoRequest($userId));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param string $message
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote> $entities
     * @return UserInfoEmpty|UserInfo|null
     * @see https://core.telegram.org/method/help.editUserInfo
     * @api
     */
    public function editUserInfo(AbstractInputUser|string|int $userId, string $message, array $entities): ?AbstractUserInfo
    {
        if (is_string($userId) || is_int($userId)) {
            $userId = $this->client->peerManager->resolve($userId);
        }
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
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return bool
     * @see https://core.telegram.org/method/help.hidePromoData
     * @api
     */
    public function hidePromoData(AbstractInputPeer|string|int $peer): bool
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return (bool) $this->client->callSync(new HidePromoDataRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $suggestion
     * @return bool
     * @see https://core.telegram.org/method/help.dismissSuggestion
     * @api
     */
    public function dismissSuggestion(AbstractInputPeer|string|int $peer, string $suggestion): bool
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
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