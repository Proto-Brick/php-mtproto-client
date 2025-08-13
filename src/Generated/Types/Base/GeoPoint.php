<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/geoPoint
 */
final class GeoPoint extends AbstractGeoPoint
{
    public const CONSTRUCTOR_ID = 0xb2a2f663;
    
    public string $predicate = 'geoPoint';
    
    /**
     * @param float $long
     * @param float $lat
     * @param int $accessHash
     * @param int|null $accuracyRadius
     */
    public function __construct(
        public readonly float $long,
        public readonly float $lat,
        public readonly int $accessHash,
        public readonly ?int $accuracyRadius = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->accuracyRadius !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= pack('d', $this->long);
        $buffer .= pack('d', $this->lat);
        $buffer .= Serializer::int64($this->accessHash);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->accuracyRadius);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $long = Deserializer::double($stream);
        $lat = Deserializer::double($stream);
        $accessHash = Deserializer::int64($stream);
        $accuracyRadius = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $long,
            $lat,
            $accessHash,
            $accuracyRadius
        );
    }
}