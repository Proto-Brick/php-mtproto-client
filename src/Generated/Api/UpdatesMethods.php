<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Updates\GetChannelDifferenceRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Updates\GetDifferenceRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Updates\GetStateRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChannelMessagesFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChannelMessagesFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChannelMessagesFilterEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChannelEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChannelFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Updates\AbstractChannelDifference;
use DigitalStars\MtprotoClient\Generated\Types\Updates\AbstractDifference;
use DigitalStars\MtprotoClient\Generated\Types\Updates\ChannelDifference;
use DigitalStars\MtprotoClient\Generated\Types\Updates\ChannelDifferenceEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Updates\ChannelDifferenceTooLong;
use DigitalStars\MtprotoClient\Generated\Types\Updates\Difference;
use DigitalStars\MtprotoClient\Generated\Types\Updates\DifferenceEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Updates\DifferenceSlice;
use DigitalStars\MtprotoClient\Generated\Types\Updates\DifferenceTooLong;
use DigitalStars\MtprotoClient\Generated\Types\Updates\State;


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
        return $this->client->callSync(new GetDifferenceRequest($pts, $date, $qts, $ptsLimit, $ptsTotalLimit, $qtsLimit));
    }

    /**
     * @param InputChannelEmpty|InputChannel|InputChannelFromMessage $channel
     * @param ChannelMessagesFilterEmpty|ChannelMessagesFilter $filter
     * @param int $pts
     * @param int $limit
     * @param bool|null $force
     * @return ChannelDifferenceEmpty|ChannelDifferenceTooLong|ChannelDifference|null
     * @see https://core.telegram.org/method/updates.getChannelDifference
     * @api
     */
    public function getChannelDifference(AbstractInputChannel $channel, AbstractChannelMessagesFilter $filter, int $pts, int $limit, ?bool $force = null): ?AbstractChannelDifference
    {
        return $this->client->callSync(new GetChannelDifferenceRequest($channel, $filter, $pts, $limit, $force));
    }
}