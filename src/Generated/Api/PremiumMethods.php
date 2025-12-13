<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Premium\ApplyBoostRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Premium\GetBoostsListRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Premium\GetBoostsStatusRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Premium\GetMyBoostsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Premium\GetUserBoostsRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
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
use ProtoBrick\MTProtoClient\Generated\Types\Premium\BoostsList;
use ProtoBrick\MTProtoClient\Generated\Types\Premium\BoostsStatus;
use ProtoBrick\MTProtoClient\Generated\Types\Premium\MyBoosts;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "premium" group.
 */
final readonly class PremiumMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $gifts
     * @return BoostsList|null
     * @see https://core.telegram.org/method/premium.getBoostsList
     * @api
     */
    public function getBoostsList(AbstractInputPeer|string|int $peer, string $offset, int $limit, ?bool $gifts = null): ?BoostsList
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
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
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param list<int>|null $slots
     * @return MyBoosts|null
     * @see https://core.telegram.org/method/premium.applyBoost
     * @api
     */
    public function applyBoost(AbstractInputPeer|string|int $peer, ?array $slots = null): ?MyBoosts
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new ApplyBoostRequest($peer, $slots));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @return BoostsStatus|null
     * @see https://core.telegram.org/method/premium.getBoostsStatus
     * @api
     */
    public function getBoostsStatus(AbstractInputPeer|string|int $peer): ?BoostsStatus
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetBoostsStatusRequest($peer));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @return BoostsList|null
     * @see https://core.telegram.org/method/premium.getUserBoosts
     * @api
     */
    public function getUserBoosts(AbstractInputPeer|string|int $peer, AbstractInputUser|string|int $userId): ?BoostsList
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        if (is_string($userId) || is_int($userId)) {
            $userId = $this->client->peerManager->resolve($userId);
        }
        return $this->client->callSync(new GetUserBoostsRequest($peer, $userId));
    }
}