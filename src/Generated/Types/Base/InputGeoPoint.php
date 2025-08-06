<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputGeoPoint
 */
final class InputGeoPoint extends AbstractInputGeoPoint
{
    public const CONSTRUCTOR_ID = 0x48222faf;
    
    public string $_ = 'inputGeoPoint';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->accuracyRadius !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= pack('d', $this->lat);
        $buffer .= pack('d', $this->long);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->accuracyRadius);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $lat = $deserializer->double($stream);
        $long = $deserializer->double($stream);
        $accuracyRadius = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        return new self(
            $lat,
            $long,
            $accuracyRadius
        );
    }
}