<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
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
     * @return Future<Config|null>
     * @see https://core.telegram.org/method/help.getConfig
     * @api
     */
    public function getConfigAsync(): Future
    {
        return $this->client->call(new GetConfigRequest());
    }

    /**
     * @return Config|null
     * @see https://core.telegram.org/method/help.getConfig
     * @api
     */
    public function getConfig(): ?Config
    {
        return $this->getConfigAsync()->await();
    }

    /**
     * @return Future<NearestDc|null>
     * @see https://core.telegram.org/method/help.getNearestDc
     * @api
     */
    public function getNearestDcAsync(): Future
    {
        return $this->client->call(new GetNearestDcRequest());
    }

    /**
     * @return NearestDc|null
     * @see https://core.telegram.org/method/help.getNearestDc
     * @api
     */
    public function getNearestDc(): ?NearestDc
    {
        return $this->getNearestDcAsync()->await();
    }

    /**
     * @param string $source
     * @return Future<AppUpdate|NoAppUpdate|null>
     * @see https://core.telegram.org/method/help.getAppUpdate
     * @api
     */
    public function getAppUpdateAsync(string $source): Future
    {
        return $this->client->call(new GetAppUpdateRequest(source: $source));
    }

    /**
     * @param string $source
     * @return AppUpdate|NoAppUpdate|null
     * @see https://core.telegram.org/method/help.getAppUpdate
     * @api
     */
    public function getAppUpdate(string $source): ?AbstractAppUpdate
    {
        return $this->getAppUpdateAsync(source: $source)->await();
    }

    /**
     * @return Future<InviteText|null>
     * @see https://core.telegram.org/method/help.getInviteText
     * @api
     */
    public function getInviteTextAsync(): Future
    {
        return $this->client->call(new GetInviteTextRequest());
    }

    /**
     * @return InviteText|null
     * @see https://core.telegram.org/method/help.getInviteText
     * @api
     */
    public function getInviteText(): ?InviteText
    {
        return $this->getInviteTextAsync()->await();
    }

    /**
     * @return Future<Support|null>
     * @see https://core.telegram.org/method/help.getSupport
     * @api
     */
    public function getSupportAsync(): Future
    {
        return $this->client->call(new GetSupportRequest());
    }

    /**
     * @return Support|null
     * @see https://core.telegram.org/method/help.getSupport
     * @api
     */
    public function getSupport(): ?Support
    {
        return $this->getSupportAsync()->await();
    }

    /**
     * @param int $pendingUpdatesCount
     * @param string $message
     * @return Future<bool>
     * @see https://core.telegram.org/method/help.setBotUpdatesStatus
     * @api
     */
    public function setBotUpdatesStatusAsync(int $pendingUpdatesCount, string $message): Future
    {
        return $this->client->call(new SetBotUpdatesStatusRequest(pendingUpdatesCount: $pendingUpdatesCount, message: $message));
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
        return (bool) $this->setBotUpdatesStatusAsync(pendingUpdatesCount: $pendingUpdatesCount, message: $message)->await();
    }

    /**
     * @return Future<CdnConfig|null>
     * @see https://core.telegram.org/method/help.getCdnConfig
     * @api
     */
    public function getCdnConfigAsync(): Future
    {
        return $this->client->call(new GetCdnConfigRequest());
    }

    /**
     * @return CdnConfig|null
     * @see https://core.telegram.org/method/help.getCdnConfig
     * @api
     */
    public function getCdnConfig(): ?CdnConfig
    {
        return $this->getCdnConfigAsync()->await();
    }

    /**
     * @param string $referer
     * @return Future<RecentMeUrls|null>
     * @see https://core.telegram.org/method/help.getRecentMeUrls
     * @api
     */
    public function getRecentMeUrlsAsync(string $referer): Future
    {
        return $this->client->call(new GetRecentMeUrlsRequest(referer: $referer));
    }

    /**
     * @param string $referer
     * @return RecentMeUrls|null
     * @see https://core.telegram.org/method/help.getRecentMeUrls
     * @api
     */
    public function getRecentMeUrls(string $referer): ?RecentMeUrls
    {
        return $this->getRecentMeUrlsAsync(referer: $referer)->await();
    }

    /**
     * @return Future<TermsOfServiceUpdateEmpty|TermsOfServiceUpdate|null>
     * @see https://core.telegram.org/method/help.getTermsOfServiceUpdate
     * @api
     */
    public function getTermsOfServiceUpdateAsync(): Future
    {
        return $this->client->call(new GetTermsOfServiceUpdateRequest());
    }

    /**
     * @return TermsOfServiceUpdateEmpty|TermsOfServiceUpdate|null
     * @see https://core.telegram.org/method/help.getTermsOfServiceUpdate
     * @api
     */
    public function getTermsOfServiceUpdate(): ?AbstractTermsOfServiceUpdate
    {
        return $this->getTermsOfServiceUpdateAsync()->await();
    }

    /**
     * @param array $id
     * @return Future<bool>
     * @see https://core.telegram.org/method/help.acceptTermsOfService
     * @api
     */
    public function acceptTermsOfServiceAsync(array $id): Future
    {
        return $this->client->call(new AcceptTermsOfServiceRequest(id: $id));
    }

    /**
     * @param array $id
     * @return bool
     * @see https://core.telegram.org/method/help.acceptTermsOfService
     * @api
     */
    public function acceptTermsOfService(array $id): bool
    {
        return (bool) $this->acceptTermsOfServiceAsync(id: $id)->await();
    }

    /**
     * @param string $path
     * @return Future<DeepLinkInfoEmpty|DeepLinkInfo|null>
     * @see https://core.telegram.org/method/help.getDeepLinkInfo
     * @api
     */
    public function getDeepLinkInfoAsync(string $path): Future
    {
        return $this->client->call(new GetDeepLinkInfoRequest(path: $path));
    }

    /**
     * @param string $path
     * @return DeepLinkInfoEmpty|DeepLinkInfo|null
     * @see https://core.telegram.org/method/help.getDeepLinkInfo
     * @api
     */
    public function getDeepLinkInfo(string $path): ?AbstractDeepLinkInfo
    {
        return $this->getDeepLinkInfoAsync(path: $path)->await();
    }

    /**
     * @param int $hash
     * @return Future<AppConfigNotModified|AppConfig|null>
     * @see https://core.telegram.org/method/help.getAppConfig
     * @api
     */
    public function getAppConfigAsync(int $hash): Future
    {
        return $this->client->call(new GetAppConfigRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return AppConfigNotModified|AppConfig|null
     * @see https://core.telegram.org/method/help.getAppConfig
     * @api
     */
    public function getAppConfig(int $hash): ?AbstractAppConfig
    {
        return $this->getAppConfigAsync(hash: $hash)->await();
    }

    /**
     * @param list<InputAppEvent> $events
     * @return Future<bool>
     * @see https://core.telegram.org/method/help.saveAppLog
     * @api
     */
    public function saveAppLogAsync(array $events): Future
    {
        return $this->client->call(new SaveAppLogRequest(events: $events));
    }

    /**
     * @param list<InputAppEvent> $events
     * @return bool
     * @see https://core.telegram.org/method/help.saveAppLog
     * @api
     */
    public function saveAppLog(array $events): bool
    {
        return (bool) $this->saveAppLogAsync(events: $events)->await();
    }

    /**
     * @param int $hash
     * @return Future<PassportConfigNotModified|PassportConfig|null>
     * @see https://core.telegram.org/method/help.getPassportConfig
     * @api
     */
    public function getPassportConfigAsync(int $hash): Future
    {
        return $this->client->call(new GetPassportConfigRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return PassportConfigNotModified|PassportConfig|null
     * @see https://core.telegram.org/method/help.getPassportConfig
     * @api
     */
    public function getPassportConfig(int $hash): ?AbstractPassportConfig
    {
        return $this->getPassportConfigAsync(hash: $hash)->await();
    }

    /**
     * @return Future<SupportName|null>
     * @see https://core.telegram.org/method/help.getSupportName
     * @api
     */
    public function getSupportNameAsync(): Future
    {
        return $this->client->call(new GetSupportNameRequest());
    }

    /**
     * @return SupportName|null
     * @see https://core.telegram.org/method/help.getSupportName
     * @api
     */
    public function getSupportName(): ?SupportName
    {
        return $this->getSupportNameAsync()->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @return Future<UserInfoEmpty|UserInfo|null>
     * @see https://core.telegram.org/method/help.getUserInfo
     * @api
     */
    public function getUserInfoAsync(AbstractInputUser|string|int $userId): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new GetUserInfoRequest(userId: $userId));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @return UserInfoEmpty|UserInfo|null
     * @see https://core.telegram.org/method/help.getUserInfo
     * @api
     */
    public function getUserInfo(AbstractInputUser|string|int $userId): ?AbstractUserInfo
    {
        return $this->getUserInfoAsync(userId: $userId)->await();
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param string $message
     * @param list<MessageEntityUnknown|MessageEntityMention|MessageEntityHashtag|MessageEntityBotCommand|MessageEntityUrl|MessageEntityEmail|MessageEntityBold|MessageEntityItalic|MessageEntityCode|MessageEntityPre|MessageEntityTextUrl|MessageEntityMentionName|InputMessageEntityMentionName|MessageEntityPhone|MessageEntityCashtag|MessageEntityUnderline|MessageEntityStrike|MessageEntityBankCard|MessageEntitySpoiler|MessageEntityCustomEmoji|MessageEntityBlockquote> $entities
     * @return Future<UserInfoEmpty|UserInfo|null>
     * @see https://core.telegram.org/method/help.editUserInfo
     * @api
     */
    public function editUserInfoAsync(AbstractInputUser|string|int $userId, string $message, array $entities): Future
    {
        if (is_string($userId) || is_int($userId)) {
            $__tmpPeer = $this->client->peerManager->resolve($userId);
            if ($__tmpPeer instanceof InputPeerUser) {
                $userId = new InputUser(userId: $__tmpPeer->userId, accessHash: $__tmpPeer->accessHash);
            } else {
                $userId = $__tmpPeer;
            }
        }
        return $this->client->call(new EditUserInfoRequest(userId: $userId, message: $message, entities: $entities));
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
        return $this->editUserInfoAsync(userId: $userId, message: $message, entities: $entities)->await();
    }

    /**
     * @return Future<PromoDataEmpty|PromoData|null>
     * @see https://core.telegram.org/method/help.getPromoData
     * @api
     */
    public function getPromoDataAsync(): Future
    {
        return $this->client->call(new GetPromoDataRequest());
    }

    /**
     * @return PromoDataEmpty|PromoData|null
     * @see https://core.telegram.org/method/help.getPromoData
     * @api
     */
    public function getPromoData(): ?AbstractPromoData
    {
        return $this->getPromoDataAsync()->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return Future<bool>
     * @see https://core.telegram.org/method/help.hidePromoData
     * @api
     */
    public function hidePromoDataAsync(AbstractInputPeer|string|int $peer): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new HidePromoDataRequest(peer: $peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return bool
     * @see https://core.telegram.org/method/help.hidePromoData
     * @api
     */
    public function hidePromoData(AbstractInputPeer|string|int $peer): bool
    {
        return (bool) $this->hidePromoDataAsync(peer: $peer)->await();
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $suggestion
     * @return Future<bool>
     * @see https://core.telegram.org/method/help.dismissSuggestion
     * @api
     */
    public function dismissSuggestionAsync(AbstractInputPeer|string|int $peer, string $suggestion): Future
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->call(new DismissSuggestionRequest(peer: $peer, suggestion: $suggestion));
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
        return (bool) $this->dismissSuggestionAsync(peer: $peer, suggestion: $suggestion)->await();
    }

    /**
     * @param string $langCode
     * @param int $hash
     * @return Future<CountriesListNotModified|CountriesList|null>
     * @see https://core.telegram.org/method/help.getCountriesList
     * @api
     */
    public function getCountriesListAsync(string $langCode, int $hash): Future
    {
        return $this->client->call(new GetCountriesListRequest(langCode: $langCode, hash: $hash));
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
        return $this->getCountriesListAsync(langCode: $langCode, hash: $hash)->await();
    }

    /**
     * @return Future<PremiumPromo|null>
     * @see https://core.telegram.org/method/help.getPremiumPromo
     * @api
     */
    public function getPremiumPromoAsync(): Future
    {
        return $this->client->call(new GetPremiumPromoRequest());
    }

    /**
     * @return PremiumPromo|null
     * @see https://core.telegram.org/method/help.getPremiumPromo
     * @api
     */
    public function getPremiumPromo(): ?PremiumPromo
    {
        return $this->getPremiumPromoAsync()->await();
    }

    /**
     * @param int $hash
     * @return Future<PeerColorsNotModified|PeerColors|null>
     * @see https://core.telegram.org/method/help.getPeerColors
     * @api
     */
    public function getPeerColorsAsync(int $hash): Future
    {
        return $this->client->call(new GetPeerColorsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return PeerColorsNotModified|PeerColors|null
     * @see https://core.telegram.org/method/help.getPeerColors
     * @api
     */
    public function getPeerColors(int $hash): ?AbstractPeerColors
    {
        return $this->getPeerColorsAsync(hash: $hash)->await();
    }

    /**
     * @param int $hash
     * @return Future<PeerColorsNotModified|PeerColors|null>
     * @see https://core.telegram.org/method/help.getPeerProfileColors
     * @api
     */
    public function getPeerProfileColorsAsync(int $hash): Future
    {
        return $this->client->call(new GetPeerProfileColorsRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return PeerColorsNotModified|PeerColors|null
     * @see https://core.telegram.org/method/help.getPeerProfileColors
     * @api
     */
    public function getPeerProfileColors(int $hash): ?AbstractPeerColors
    {
        return $this->getPeerProfileColorsAsync(hash: $hash)->await();
    }

    /**
     * @param int $hash
     * @return Future<TimezonesListNotModified|TimezonesList|null>
     * @see https://core.telegram.org/method/help.getTimezonesList
     * @api
     */
    public function getTimezonesListAsync(int $hash): Future
    {
        return $this->client->call(new GetTimezonesListRequest(hash: $hash));
    }

    /**
     * @param int $hash
     * @return TimezonesListNotModified|TimezonesList|null
     * @see https://core.telegram.org/method/help.getTimezonesList
     * @api
     */
    public function getTimezonesList(int $hash): ?AbstractTimezonesList
    {
        return $this->getTimezonesListAsync(hash: $hash)->await();
    }
}