<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessLocation
 */
final class BusinessLocation extends TlObject
{
    public const CONSTRUCTOR_ID = 0xac5c1af7;
    
    public string $_ = 'businessLocation';
    
    /**
     * @param string $address
     * @param AbstractGeoPoint|null $geoPoint
     */
    public function __construct(
        public readonly string $address,
        public readonly ?AbstractGeoPoint $geoPoint = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->geoPoint !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->geoPoint->serialize($serializer);
        }
        $buffer .= $serializer->bytes($this->address);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $geoPoint = ($flags & (1 << 0)) ? AbstractGeoPoint::deserialize($deserializer, $stream) : null;
        $address = $deserializer->bytes($stream);
        return new self(
            $address,
            $geoPoint
        );
    }
}