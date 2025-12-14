<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputGeoPoint
 */
final class InputGeoPoint extends AbstractInputGeoPoint
{
    public const CONSTRUCTOR_ID = 0x48222faf;
    
    public string $predicate = 'inputGeoPoint';
    
    /**
     * @param float $lat
     * @param float $long
     * @param int|null $accuracyRadius
     */
    public function __construct(
        public readonly float $lat,
        public readonly float $long,
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
        $buffer .= pack('d', $this->lat);
        $buffer .= pack('d', $this->long);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->accuracyRadius);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $lat = unpack('d', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $long = unpack('d', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $accuracyRadius = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $lat,
            $long,
            $accuracyRadius
        );
    }
}