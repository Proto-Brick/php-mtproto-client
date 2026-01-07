<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Stats\GetBroadcastStatsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stats\GetMegagroupStatsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stats\GetMessagePublicForwardsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stats\GetMessageStatsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stats\GetStoryPublicForwardsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stats\GetStoryStatsRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Stats\LoadAsyncGraphRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStatsGraph;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChannelEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StatsGraph;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StatsGraphAsync;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StatsGraphError;
use ProtoBrick\MTProtoClient\Generated\Types\Stats\BroadcastStats;
use ProtoBrick\MTProtoClient\Generated\Types\Stats\MegagroupStats;
use ProtoBrick\MTProtoClient\Generated\Types\Stats\MessageStats;
use ProtoBrick\MTProtoClient\Generated\Types\Stats\PublicForwards;
use ProtoBrick\MTProtoClient\Generated\Types\Stats\StoryStats;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "stats" group.
 */
final readonly class StatsMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool|null $dark
     * @return BroadcastStats|null
     * @see https://core.telegram.org/method/stats.getBroadcastStats
     * @api
     */
    public function getBroadcastStats(AbstractInputChannel|string|int $channel, ?bool $dark = null): ?BroadcastStats
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->callSync(new GetBroadcastStatsRequest(channel: $channel, dark: $dark));
    }

    /**
     * @param string $token
     * @param int|null $x
     * @return StatsGraphAsync|StatsGraphError|StatsGraph|null
     * @see https://core.telegram.org/method/stats.loadAsyncGraph
     * @api
     */
    public function loadAsyncGraph(string $token, ?int $x = null): ?AbstractStatsGraph
    {
        return $this->client->callSync(new LoadAsyncGraphRequest(token: $token, x: $x));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param bool|null $dark
     * @return MegagroupStats|null
     * @see https://core.telegram.org/method/stats.getMegagroupStats
     * @api
     */
    public function getMegagroupStats(AbstractInputChannel|string|int $channel, ?bool $dark = null): ?MegagroupStats
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->callSync(new GetMegagroupStatsRequest(channel: $channel, dark: $dark));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $msgId
     * @param string $offset
     * @param int $limit
     * @return PublicForwards|null
     * @see https://core.telegram.org/method/stats.getMessagePublicForwards
     * @api
     */
    public function getMessagePublicForwards(AbstractInputChannel|string|int $channel, int $msgId, string $offset, int $limit): ?PublicForwards
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->callSync(new GetMessagePublicForwardsRequest(channel: $channel, msgId: $msgId, offset: $offset, limit: $limit));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param int $msgId
     * @param bool|null $dark
     * @return MessageStats|null
     * @see https://core.telegram.org/method/stats.getMessageStats
     * @api
     */
    public function getMessageStats(AbstractInputChannel|string|int $channel, int $msgId, ?bool $dark = null): ?MessageStats
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->callSync(new GetMessageStatsRequest(channel: $channel, msgId: $msgId, dark: $dark));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param bool|null $dark
     * @return StoryStats|null
     * @see https://core.telegram.org/method/stats.getStoryStats
     * @api
     */
    public function getStoryStats(AbstractInputPeer|string|int $peer, int $id, ?bool $dark = null): ?StoryStats
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetStoryStatsRequest(peer: $peer, id: $id, dark: $dark));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage|string|int $peer
     * @param int $id
     * @param string $offset
     * @param int $limit
     * @return PublicForwards|null
     * @see https://core.telegram.org/method/stats.getStoryPublicForwards
     * @api
     */
    public function getStoryPublicForwards(AbstractInputPeer|string|int $peer, int $id, string $offset, int $limit): ?PublicForwards
    {
        if (is_string($peer) || is_int($peer)) {
            $peer = $this->client->peerManager->resolve($peer);
        }
        return $this->client->callSync(new GetStoryPublicForwardsRequest(peer: $peer, id: $id, offset: $offset, limit: $limit));
    }
}