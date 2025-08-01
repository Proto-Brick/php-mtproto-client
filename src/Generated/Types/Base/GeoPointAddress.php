<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/geoPointAddress
 */
final class GeoPointAddress extends AbstractGeoPointAddress
{
    public const CONSTRUCTOR_ID = 3729546643;
    
    public string $_ = 'geoPointAddress';
    
    /**
     * @param string $countryIso2
     * @param string|null $state
     * @param string|null $city
     * @param string|null $street
     */
    public function __construct(
        public readonly string $countryIso2,
        public readonly ?string $state = null,
        public readonly ?string $city = null,
        public readonly ?string $street = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->state !== null) $flags |= (1 << 0);
        if ($this->city !== null) $flags |= (1 << 1);
        if ($this->street !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->countryIso2);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->state);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->city);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->street);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $countryIso2 = $deserializer->bytes($stream);
        $state = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $city = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $street = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
            return new self(
            $countryIso2,
            $state,
            $city,
            $street
        );
    }
}