<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $n = Deserializer::int32($stream);
        $x = Deserializer::double($stream);
        $y = Deserializer::double($stream);
        $zoom = Deserializer::double($stream);

        return new self(
            $n,
            $x,
            $y,
            $zoom
        );
    }
}