<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starGiftAuctionRound
 */
final class StarGiftAuctionRound extends AbstractStarGiftAuctionRound
{
    public const CONSTRUCTOR_ID = 0x3aae0528;
    
    public string $predicate = 'starGiftAuctionRound';
    
    /**
     * @param int $num
     * @param int $duration
     */
    public function __construct(
        public readonly int $num,
        public readonly int $duration
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->num);
        $buffer .= Serializer::int32($this->duration);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $num = Deserializer::int32($__payload, $__offset);
        $duration = Deserializer::int32($__payload, $__offset);

        return new self(
            $num,
            $duration
        );
    }
}