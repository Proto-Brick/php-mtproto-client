<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/mediaAreaCoordinates
 */
final class MediaAreaCoordinates extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcfc9e002;
    
    public string $predicate = 'mediaAreaCoordinates';
    
    /**
     * @param float $x
     * @param float $y
     * @param float $w
     * @param float $h
     * @param float $rotation
     * @param float|null $radius
     */
    public function __construct(
        public readonly float $x,
        public readonly float $y,
        public readonly float $w,
        public readonly float $h,
        public readonly float $rotation,
        public readonly ?float $radius = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->radius !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= pack('d', $this->x);
        $buffer .= pack('d', $this->y);
        $buffer .= pack('d', $this->w);
        $buffer .= pack('d', $this->h);
        $buffer .= pack('d', $this->rotation);
        if ($flags & (1 << 0)) {
            $buffer .= pack('d', $this->radius);
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
        $x = Deserializer::double($__payload, $__offset);
        $y = Deserializer::double($__payload, $__offset);
        $w = Deserializer::double($__payload, $__offset);
        $h = Deserializer::double($__payload, $__offset);
        $rotation = Deserializer::double($__payload, $__offset);
        $radius = (($flags & (1 << 0)) !== 0) ? Deserializer::double($__payload, $__offset) : null;

        return new self(
            $x,
            $y,
            $w,
            $h,
            $rotation,
            $radius
        );
    }
}