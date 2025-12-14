<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/maskCoords
 */
final class MaskCoords extends TlObject
{
    public const CONSTRUCTOR_ID = 0xaed6dbb2;
    
    public string $predicate = 'maskCoords';
    
    /**
     * @param int $n
     * @param float $x
     * @param float $y
     * @param float $zoom
     */
    public function __construct(
        public readonly int $n,
        public readonly float $x,
        public readonly float $y,
        public readonly float $zoom
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->n);
        $buffer .= pack('d', $this->x);
        $buffer .= pack('d', $this->y);
        $buffer .= pack('d', $this->zoom);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $n = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $x = unpack('d', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $y = unpack('d', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $zoom = unpack('d', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $n,
            $x,
            $y,
            $zoom
        );
    }
}