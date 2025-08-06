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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int64($this->stars);
        $buffer .= $serializer->int32($this->quantity);
        $buffer .= $serializer->int32($this->boosts);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int64($stream);
        $stars = $deserializer->int64($stream);
        $quantity = $deserializer->int32($stream);
        $boosts = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        return new self(
            $id,
            $stars,
            $quantity,
            $boosts,
            $date
        );
    }
}