<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/shippingOption
 */
final class ShippingOption extends AbstractShippingOption
{
    public const CONSTRUCTOR_ID = 3055631583;
    
    public string $_ = 'shippingOption';
    
    /**
     * @param string $id
     * @param string $title
     * @param list<AbstractLabeledPrice> $prices
     */
    public function __construct(
        public readonly string $id,
        public readonly string $title,
        public readonly array $prices
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->id);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->vectorOfObjects($this->prices);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->bytes($stream);
        $title = $deserializer->bytes($stream);
        $prices = $deserializer->vectorOfObjects($stream, [AbstractLabeledPrice::class, 'deserialize']);
            return new self(
            $id,
            $title,
            $prices
        );
    }
}