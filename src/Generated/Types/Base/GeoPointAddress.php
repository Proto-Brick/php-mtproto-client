<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/geoPointAddress
 */
final class GeoPointAddress extends TlObject
{
    public const CONSTRUCTOR_ID = 0xde4c5d93;
    
    public string $predicate = 'geoPointAddress';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->state !== null) {
            $flags |= (1 << 0);
        }
        if ($this->city !== null) {
            $flags |= (1 << 1);
        }
        if ($this->street !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->countryIso2);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->state);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->city);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->street);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $countryIso2 = Deserializer::bytes($__payload, $__offset);
        $state = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $city = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $street = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $countryIso2,
            $state,
            $city,
            $street
        );
    }
}