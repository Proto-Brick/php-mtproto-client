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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::vectorOfObjects($this->prices);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $id = Deserializer::bytes($stream);
        $title = Deserializer::bytes($stream);
        $prices = Deserializer::vectorOfObjects($stream, [LabeledPrice::class, 'deserialize']);
        return new self(
            $id,
            $title,
            $prices
        );
    }
}