<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Updates\GetChannelDifferenceRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Updates\GetDifferenceRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Updates\GetStateRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChannelMessagesFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelMessagesFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ChannelMessagesFilterEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChannelEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputChannelFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Updates\AbstractChannelDifference;
use ProtoBrick\MTProtoClient\Generated\Types\Updates\AbstractDifference;
use ProtoBrick\MTProtoClient\Generated\Types\Updates\ChannelDifference;
use ProtoBrick\MTProtoClient\Generated\Types\Updates\ChannelDifferenceEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Updates\ChannelDifferenceTooLong;
use ProtoBrick\MTProtoClient\Generated\Types\Updates\Difference;
use ProtoBrick\MTProtoClient\Generated\Types\Updates\DifferenceEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Updates\DifferenceSlice;
use ProtoBrick\MTProtoClient\Generated\Types\Updates\DifferenceTooLong;
use ProtoBrick\MTProtoClient\Generated\Types\Updates\State;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "updates" group.
 */
final readonly class UpdatesMethods
{
    public function __construct(private Client $client) {}

    /**
     * @return State|null
     * @see https://core.telegram.org/method/updates.getState
     * @api
     */
    public function getState(): ?State
    {
        return $this->client->callSync(new GetStateRequest());
    }

    /**
     * @param int $pts
     * @param int $date
     * @param int $qts
     * @param int|null $ptsLimit
     * @param int|null $ptsTotalLimit
     * @param int|null $qtsLimit
     * @return DifferenceEmpty|Difference|DifferenceSlice|DifferenceTooLong|null
     * @see https://core.telegram.org/method/updates.getDifference
     * @api
     */
    public function getDifference(int $pts, int $date, int $qts, ?int $ptsLimit = null, ?int $ptsTotalLimit = null, ?int $qtsLimit = null): ?AbstractDifference
    {
        return $this->client->callSync(new GetDifferenceRequest(pts: $pts, date: $date, qts: $qts, ptsLimit: $ptsLimit, ptsTotalLimit: $ptsTotalLimit, qtsLimit: $qtsLimit));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage|string|int $channel
     * @param ChannelMessagesFilterEmpty|ChannelMessagesFilter $filter
     * @param int $pts
     * @param int $limit
     * @param bool|null $force
     * @return ChannelDifferenceEmpty|ChannelDifferenceTooLong|ChannelDifference|null
     * @see https://core.telegram.org/method/updates.getChannelDifference
     * @api
     */
    public function getChannelDifference(AbstractInputChannel|string|int $channel, AbstractChannelMessagesFilter $filter, int $pts, int $limit, ?bool $force = null): ?AbstractChannelDifference
    {
        if (is_string($channel) || is_int($channel)) {
            $__tmpPeer = $this->client->peerManager->resolve($channel);
            if ($__tmpPeer instanceof InputPeerChannel) {
                $channel = new InputChannel(channelId: $__tmpPeer->channelId, accessHash: $__tmpPeer->accessHash);
            } else {
                $channel = $__tmpPeer;
            }
        }
        return $this->client->callSync(new GetChannelDifferenceRequest(channel: $channel, filter: $filter, pts: $pts, limit: $limit, force: $force));
    }
}