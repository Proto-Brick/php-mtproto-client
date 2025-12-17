<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/prepaidStarsGiveaway
 */
final class PrepaidStarsGiveaway extends AbstractPrepaidGiveaway
{
    public const CONSTRUCTOR_ID = 0x9a9d77e0;
    
    public string $predicate = 'prepaidStarsGiveaway';
    
    /**
     * @param int $id
     * @param int $stars
     * @param int $quantity
     * @param int $boosts
     * @param int $date
     */
    public function __construct(
        public readonly int $id,
        public readonly int $stars,
        public readonly int $quantity,
        public readonly int $boosts,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->stars);
        $buffer .= Serializer::int32($this->quantity);
        $buffer .= Serializer::int32($this->boosts);
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);
        $stars = Deserializer::int64($__payload, $__offset);
        $quantity = Deserializer::int32($__payload, $__offset);
        $boosts = Deserializer::int32($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);

        return new self(
            $id,
            $stars,
            $quantity,
            $boosts,
            $date
        );
    }
}