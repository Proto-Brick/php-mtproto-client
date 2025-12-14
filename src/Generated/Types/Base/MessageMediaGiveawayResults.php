<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaGiveawayResults
 */
final class MessageMediaGiveawayResults extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0xceaa3ea1;
    
    public string $predicate = 'messageMediaGiveawayResults';
    
    /**
     * @param int $channelId
     * @param int $launchMsgId
     * @param int $winnersCount
     * @param int $unclaimedCount
     * @param list<int> $winners
     * @param int $untilDate
     * @param true|null $onlyNewSubscribers
     * @param true|null $refunded
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
        public readonly ?true $onlyNewSubscribers = null,
        public readonly ?true $refunded = null,
        public readonly ?int $additionalPeersCount = null,
        public readonly ?int $months = null,
        public readonly ?int $stars = null,
        public readonly ?string $prizeDescription = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->onlyNewSubscribers) {
            $flags |= (1 << 0);
        }
        if ($this->refunded) {
            $flags |= (1 << 2);
        }
        if ($this->additionalPeersCount !== null) {
            $flags |= (1 << 3);
        }
        if ($this->months !== null) {
            $flags |= (1 << 4);
        }
        if ($this->stars !== null) {
            $flags |= (1 << 5);
        }
        if ($this->prizeDescription !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->channelId);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->additionalPeersCount);
        }
        $buffer .= Serializer::int32($this->launchMsgId);
        $buffer .= Serializer::int32($this->winnersCount);
        $buffer .= Serializer::int32($this->unclaimedCount);
        $buffer .= Serializer::vectorOfLongs($this->winners);
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->months);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int64($this->stars);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->prizeDescription);
        }
        $buffer .= Serializer::int32($this->untilDate);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $onlyNewSubscribers = (($flags & (1 << 0)) !== 0) ? true : null;
        $refunded = (($flags & (1 << 2)) !== 0) ? true : null;
        $channelId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $additionalPeersCount = (($flags & (1 << 3)) !== 0) ? Deserializer::int32($stream) : null;
        $launchMsgId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $winnersCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $unclaimedCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $winners = Deserializer::vectorOfLongs($stream);
        $months = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($stream) : null;
        $stars = (($flags & (1 << 5)) !== 0) ? Deserializer::int64($stream) : null;
        $prizeDescription = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $untilDate = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

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