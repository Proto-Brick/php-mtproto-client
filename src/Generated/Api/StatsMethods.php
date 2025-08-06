<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Stats\GetBroadcastRevenueStatsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stats\GetBroadcastRevenueTransactionsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stats\GetBroadcastRevenueWithdrawalUrlRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stats\GetBroadcastStatsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stats\GetMegagroupStatsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stats\GetMessagePublicForwardsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stats\GetMessageStatsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stats\GetStoryPublicForwardsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stats\GetStoryStatsRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Stats\LoadAsyncGraphRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStatsGraph;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChannelEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\StatsGraph;
use DigitalStars\MtprotoClient\Generated\Types\Base\StatsGraphAsync;
use DigitalStars\MtprotoClient\Generated\Types\Base\StatsGraphError;
use DigitalStars\MtprotoClient\Generated\Types\Stats\BroadcastRevenueStats;
use DigitalStars\MtprotoClient\Generated\Types\Stats\BroadcastRevenueTransactions;
use DigitalStars\MtprotoClient\Generated\Types\Stats\BroadcastRevenueWithdrawalUrl;
use DigitalStars\MtprotoClient\Generated\Types\Stats\BroadcastStats;
use DigitalStars\MtprotoClient\Generated\Types\Stats\MegagroupStats;
use DigitalStars\MtprotoClient\Generated\Types\Stats\MessageStats;
use DigitalStars\MtprotoClient\Generated\Types\Stats\PublicForwards;
use DigitalStars\MtprotoClient\Generated\Types\Stats\StoryStats;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "stats" group.
 */
final readonly class StatsMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool|null $dark
     * @return BroadcastStats|null
     * @see https://core.telegram.org/method/stats.getBroadcastStats
     * @api
     */
    public function getBroadcastStats(AbstractInputChannel $channel, ?bool $dark = null): ?BroadcastStats
    {
        return $this->client->callSync(new GetBroadcastStatsRequest($channel, $dark));
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
        return $this->client->callSync(new LoadAsyncGraphRequest($token, $x));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param bool|null $dark
     * @return MegagroupStats|null
     * @see https://core.telegram.org/method/stats.getMegagroupStats
     * @api
     */
    public function getMegagroupStats(AbstractInputChannel $channel, ?bool $dark = null): ?MegagroupStats
    {
        return $this->client->callSync(new GetMegagroupStatsRequest($channel, $dark));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $msgId
     * @param string $offset
     * @param int $limit
     * @return PublicForwards|null
     * @see https://core.telegram.org/method/stats.getMessagePublicForwards
     * @api
     */
    public function getMessagePublicForwards(AbstractInputChannel $channel, int $msgId, string $offset, int $limit): ?PublicForwards
    {
        return $this->client->callSync(new GetMessagePublicForwardsRequest($channel, $msgId, $offset, $limit));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param int $msgId
     * @param bool|null $dark
     * @return MessageStats|null
     * @see https://core.telegram.org/method/stats.getMessageStats
     * @api
     */
    public function getMessageStats(AbstractInputChannel $channel, int $msgId, ?bool $dark = null): ?MessageStats
    {
        return $this->client->callSync(new GetMessageStatsRequest($channel, $msgId, $dark));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @param bool|null $dark
     * @return StoryStats|null
     * @see https://core.telegram.org/method/stats.getStoryStats
     * @api
     */
    public function getStoryStats(AbstractInputPeer $peer, int $id, ?bool $dark = null): ?StoryStats
    {
        return $this->client->callSync(new GetStoryStatsRequest($peer, $id, $dark));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $id
     * @param string $offset
     * @param int $limit
     * @return PublicForwards|null
     * @see https://core.telegram.org/method/stats.getStoryPublicForwards
     * @api
     */
    public function getStoryPublicForwards(AbstractInputPeer $peer, int $id, string $offset, int $limit): ?PublicForwards
    {
        return $this->client->callSync(new GetStoryPublicForwardsRequest($peer, $id, $offset, $limit));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param bool|null $dark
     * @return BroadcastRevenueStats|null
     * @see https://core.telegram.org/method/stats.getBroadcastRevenueStats
     * @api
     */
    public function getBroadcastRevenueStats(AbstractInputPeer $peer, ?bool $dark = null): ?BroadcastRevenueStats
    {
        return $this->client->callSync(new GetBroadcastRevenueStatsRequest($peer, $dark));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param InputCheckPasswordEmpty|InputCheckPasswordSRP $password
     * @return BroadcastRevenueWithdrawalUrl|null
     * @see https://core.telegram.org/method/stats.getBroadcastRevenueWithdrawalUrl
     * @api
     */
    public function getBroadcastRevenueWithdrawalUrl(AbstractInputPeer $peer, AbstractInputCheckPasswordSRP $password): ?BroadcastRevenueWithdrawalUrl
    {
        return $this->client->callSync(new GetBroadcastRevenueWithdrawalUrlRequest($peer, $password));
    }

    /**
     * @param InputPeerEmpty|InputPeerSelf|InputPeerChat|InputPeerUser|InputPeerChannel|InputPeerUserFromMessage|InputPeerChannelFromMessage $peer
     * @param int $offset
     * @param int $limit
     * @return BroadcastRevenueTransactions|null
     * @see https://core.telegram.org/method/stats.getBroadcastRevenueTransactions
     * @api
     */
    public function getBroadcastRevenueTransactions(AbstractInputPeer $peer, int $offset, int $limit): ?BroadcastRevenueTransactions
    {
        return $this->client->callSync(new GetBroadcastRevenueTransactionsRequest($peer, $offset, $limit));
    }
}