<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starGiftAuctionRoundExtendable
 */
final class StarGiftAuctionRoundExtendable extends AbstractStarGiftAuctionRound
{
    public const CONSTRUCTOR_ID = 0xaa021e5;
    
    public string $predicate = 'starGiftAuctionRoundExtendable';
    
    /**
     * @param int $num
     * @param int $duration
     * @param int $extendTop
     * @param int $extendWindow
     */
    public function __construct(
        public readonly int $num,
        public readonly int $duration,
        public readonly int $extendTop,
        public readonly int $extendWindow
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->num);
        $buffer .= Serializer::int32($this->duration);
        $buffer .= Serializer::int32($this->extendTop);
        $buffer .= Serializer::int32($this->extendWindow);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $num = Deserializer::int32($__payload, $__offset);
        $duration = Deserializer::int32($__payload, $__offset);
        $extendTop = Deserializer::int32($__payload, $__offset);
        $extendWindow = Deserializer::int32($__payload, $__offset);

        return new self(
            $num,
            $duration,
            $extendTop,
            $extendWindow
        );
    }
}