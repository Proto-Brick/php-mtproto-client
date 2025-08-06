<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Premium\ApplyBoostRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Premium\GetBoostsListRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Premium\GetBoostsStatusRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Premium\GetMyBoostsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Premium\GetUserBoostsRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
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
use DigitalStars\MtprotoClient\Generated\Types\Premium\BoostsList;
use DigitalStars\MtprotoClient\Generated\Types\Premium\BoostsStatus;
use DigitalStars\MtprotoClient\Generated\Types\Premium\MyBoosts;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "premium" group.
 */
final readonly class PremiumMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $gifts
     * @return BoostsList|null
     * @see https://core.telegram.org/method/premium.getBoostsList
     * @api
     */
    public function getBoostsList(AbstractInputPeer $peer, string $offset, int $limit, ?bool $gifts = null): ?BoostsList
    {
        return $this->client->callSync(new GetBoostsListRequest($peer, $offset, $limit, $gifts));
    }

    /**
     * @return MyBoosts|null
     * @see https://core.telegram.org/method/premium.getMyBoosts
     * @api
     */
    public function getMyBoosts(): ?MyBoosts
    {
        return $this->client->callSync(new GetMyBoostsRequest());
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param list<int>|null $slots
     * @return MyBoosts|null
     * @see https://core.telegram.org/method/premium.applyBoost
     * @api
     */
    public function applyBoost(AbstractInputPeer $peer, ?array $slots = null): ?MyBoosts
    {
        return $this->client->callSync(new ApplyBoostRequest($peer, $slots));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @return BoostsStatus|null
     * @see https://core.telegram.org/method/premium.getBoostsStatus
     * @api
     */
    public function getBoostsStatus(AbstractInputPeer $peer): ?BoostsStatus
    {
        return $this->client->callSync(new GetBoostsStatusRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @return BoostsList|null
     * @see https://core.telegram.org/method/premium.getUserBoosts
     * @api
     */
    public function getUserBoosts(AbstractInputPeer $peer, AbstractInputUser $userId): ?BoostsList
    {
        return $this->client->callSync(new GetUserBoostsRequest($peer, $userId));
    }
}