<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
        if ($this->radius !== null) $flags |= (1 << 0);
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

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $x = Deserializer::double($stream);
        $y = Deserializer::double($stream);
        $w = Deserializer::double($stream);
        $h = Deserializer::double($stream);
        $rotation = Deserializer::double($stream);
        $radius = ($flags & (1 << 0)) ? Deserializer::double($stream) : null;

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