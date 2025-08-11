<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/prepaidStarsGiveaway
 */
final class PrepaidStarsGiveaway extends AbstractPrepaidGiveaway
{
    public const CONSTRUCTOR_ID = 0x9a9d77e0;
    
    public string $_ = 'prepaidStarsGiveaway';
    
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $id = Deserializer::int64($stream);
        $stars = Deserializer::int64($stream);
        $quantity = Deserializer::int32($stream);
        $boosts = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        return new self(
            $id,
            $stars,
            $quantity,
            $boosts,
            $date
        );
    }
}