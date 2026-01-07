<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
        if ($this->geoPoint !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->geoPoint->serialize();
        }
        $buffer .= Serializer::bytes($this->address);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $geoPoint = (($flags & (1 << 0)) !== 0) ? AbstractGeoPoint::deserialize($__payload, $__offset) : null;
        $address = Deserializer::bytes($__payload, $__offset);

        return new self(
            $address,
            $geoPoint
        );
    }
}