<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaGiveawayResults
 */
final class MessageMediaGiveawayResults extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0xceaa3ea1;
    
    public string $_ = 'messageMediaGiveawayResults';
    
    /**
     * @param int $channelId
     * @param int $launchMsgId
     * @param int $winnersCount
     * @param int $unclaimedCount
     * @param list<int> $winners
     * @param int $untilDate
     * @param bool|null $onlyNewSubscribers
     * @param bool|null $refunded
     * @param int|null $additionalPeersCount
     * @param int|null $months
     * @param int|null $stars
     * @param string|null $prizeDescription
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $launchMsgId,
        public readonly int $winnersCount,
        public readonly int $unclaimedCount,
        public readonly array $winners,
        public readonly int $untilDate,
        public readonly ?bool $onlyNewSubscribers = null,
        public readonly ?bool $refunded = null,
        public readonly ?int $additionalPeersCount = null,
        public readonly ?int $months = null,
        public readonly ?int $stars = null,
        public readonly ?string $prizeDescription = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->onlyNewSubscribers) $flags |= (1 << 0);
        if ($this->refunded) $flags |= (1 << 2);
        if ($this->additionalPeersCount !== null) $flags |= (1 << 3);
        if ($this->months !== null) $flags |= (1 << 4);
        if ($this->stars !== null) $flags |= (1 << 5);
        if ($this->prizeDescription !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->channelId);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->int32($this->additionalPeersCount);
        }
        $buffer .= $serializer->int32($this->launchMsgId);
        $buffer .= $serializer->int32($this->winnersCount);
        $buffer .= $serializer->int32($this->unclaimedCount);
        $buffer .= $serializer->vectorOfLongs($this->winners);
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->months);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->int64($this->stars);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->prizeDescription);
        }
        $buffer .= $serializer->int32($this->untilDate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $onlyNewSubscribers = ($flags & (1 << 0)) ? true : null;
        $refunded = ($flags & (1 << 2)) ? true : null;
        $channelId = $deserializer->int64($stream);
        $additionalPeersCount = ($flags & (1 << 3)) ? $deserializer->int32($stream) : null;
        $launchMsgId = $deserializer->int32($stream);
        $winnersCount = $deserializer->int32($stream);
        $unclaimedCount = $deserializer->int32($stream);
        $winners = $deserializer->vectorOfLongs($stream);
        $months = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
        $stars = ($flags & (1 << 5)) ? $deserializer->int64($stream) : null;
        $prizeDescription = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $untilDate = $deserializer->int32($stream);
        return new self(
            $channelId,
            $launchMsgId,
            $winnersCount,
            $unclaimedCount,
            $winners,
            $untilDate,
            $onlyNewSubscribers,
            $refunded,
            $additionalPeersCount,
            $months,
            $stars,
            $prizeDescription
        );
    }
}