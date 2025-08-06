<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/prepaidGiveaway
 */
final class PrepaidGiveaway extends AbstractPrepaidGiveaway
{
    public const CONSTRUCTOR_ID = 0xb2539d54;
    
    public string $_ = 'prepaidGiveaway';
    
    /**
     * @param int $id
     * @param int $months
     * @param int $quantity
     * @param int $date
     */
    public function __construct(
        public readonly int $id,
        public readonly int $months,
        public readonly int $quantity,
        public readonly int $date
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int32($this->months);
        $buffer .= $serializer->int32($this->quantity);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int64($stream);
        $months = $deserializer->int32($stream);
        $quantity = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        return new self(
            $id,
            $months,
            $quantity,
            $date
        );
    }
}