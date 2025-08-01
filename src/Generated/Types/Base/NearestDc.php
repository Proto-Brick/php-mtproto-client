<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/nearestDc
 */
final class NearestDc extends AbstractNearestDc
{
    public const CONSTRUCTOR_ID = 2384074613;
    
    public string $_ = 'nearestDc';
    
    /**
     * @param string $country
     * @param int $thisDc
     * @param int $nearestDc
     */
    public function __construct(
        public readonly string $country,
        public readonly int $thisDc,
        public readonly int $nearestDc
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->country);
        $buffer .= $serializer->int32($this->thisDc);
        $buffer .= $serializer->int32($this->nearestDc);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $country = $deserializer->bytes($stream);
        $thisDc = $deserializer->int32($stream);
        $nearestDc = $deserializer->int32($stream);
            return new self(
            $country,
            $thisDc,
            $nearestDc
        );
    }
}