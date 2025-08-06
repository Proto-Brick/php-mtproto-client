<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/shippingOption
 */
final class ShippingOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb6213cdf;
    
    public string $_ = 'shippingOption';
    
    /**
     * @param string $id
     * @param string $title
     * @param list<LabeledPrice> $prices
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $id = $deserializer->bytes($stream);
        $title = $deserializer->bytes($stream);
        $prices = $deserializer->vectorOfObjects($stream, [LabeledPrice::class, 'deserialize']);
        return new self(
            $id,
            $title,
            $prices
        );
    }
}