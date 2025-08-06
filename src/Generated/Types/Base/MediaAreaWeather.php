<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/mediaAreaWeather
 */
final class MediaAreaWeather extends AbstractMediaArea
{
    public const CONSTRUCTOR_ID = 0x49a6549c;
    
    public string $_ = 'mediaAreaWeather';
    
    /**
     * @param MediaAreaCoordinates $coordinates
     * @param string $emoji
     * @param float $temperatureC
     * @param int $color
     */
    public function __construct(
        public readonly MediaAreaCoordinates $coordinates,
        public readonly string $emoji,
        public readonly float $temperatureC,
        public readonly int $color
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->coordinates->serialize($serializer);
        $buffer .= $serializer->bytes($this->emoji);
        $buffer .= pack('d', $this->temperatureC);
        $buffer .= $serializer->int32($this->color);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $coordinates = MediaAreaCoordinates::deserialize($deserializer, $stream);
        $emoji = $deserializer->bytes($stream);
        $temperatureC = $deserializer->double($stream);
        $color = $deserializer->int32($stream);
        return new self(
            $coordinates,
            $emoji,
            $temperatureC,
            $color
        );
    }
}