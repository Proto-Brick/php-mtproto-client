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
    
    public string $predicate = 'businessLocation';
    
    /**
     * @param string $address
     * @param AbstractGeoPoint|null $geoPoint
     */
    public function __construct(
        public readonly string $address,
        public readonly ?AbstractGeoPoint $geoPoint = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->geoPoint !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->geoPoint->serialize();
        }
        $buffer .= Serializer::bytes($this->address);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $geoPoint = ($flags & (1 << 0)) ? AbstractGeoPoint::deserialize($stream) : null;
        $address = Deserializer::bytes($stream);

        return new self(
            $address,
            $geoPoint
        );
    }
}