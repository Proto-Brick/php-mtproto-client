<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelParticipant
 */
final class ChannelParticipant extends AbstractChannelParticipant
{
    public const CONSTRUCTOR_ID = 0xcb397619;
    
    public string $predicate = 'channelParticipant';
    
    /**
     * @param int $userId
     * @param int $date
     * @param int|null $subscriptionUntilDate
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $date,
        public readonly ?int $subscriptionUntilDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->subscriptionUntilDate !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->subscriptionUntilDate);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $subscriptionUntilDate = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $userId,
            $date,
            $subscriptionUntilDate
        );
    }
}