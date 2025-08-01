<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/mediaAreaCoordinates
 */
final class MediaAreaCoordinates extends AbstractMediaAreaCoordinates
{
    public const CONSTRUCTOR_ID = 3486113794;
    
    public string $_ = 'mediaAreaCoordinates';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->radius !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

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

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $x = $deserializer->double($stream);
        $y = $deserializer->double($stream);
        $w = $deserializer->double($stream);
        $h = $deserializer->double($stream);
        $rotation = $deserializer->double($stream);
        $radius = ($flags & (1 << 0)) ? $deserializer->double($stream) : null;
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