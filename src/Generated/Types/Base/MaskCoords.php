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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $n = Deserializer::int32($__payload, $__offset);
        $x = Deserializer::double($__payload, $__offset);
        $y = Deserializer::double($__payload, $__offset);
        $zoom = Deserializer::double($__payload, $__offset);

        return new self(
            $n,
            $x,
            $y,
            $zoom
        );
    }
}