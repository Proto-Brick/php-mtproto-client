<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Updates;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updates.channelDifferenceEmpty
 */
final class ChannelDifferenceEmpty extends AbstractChannelDifference
{
    public const CONSTRUCTOR_ID = 0x3e11affb;
    
    public string $predicate = 'updates.channelDifferenceEmpty';
    
    /**
     * @param int $pts
     * @param true|null $final_
     * @param int|null $timeout
     */
    public function __construct(
        public readonly int $pts,
        public readonly ?true $final_ = null,
        public readonly ?int $timeout = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->final_) {
            $flags |= (1 << 0);
        }
        if ($this->timeout !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->pts);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->timeout);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $final_ = (($flags & (1 << 0)) !== 0) ? true : null;
        $pts = Deserializer::int32($__payload, $__offset);
        $timeout = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $pts,
            $final_,
            $timeout
        );
    }
}