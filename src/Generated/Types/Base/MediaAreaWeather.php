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
    
    public string $predicate = 'mediaAreaWeather';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->coordinates->serialize();
        $buffer .= Serializer::bytes($this->emoji);
        $buffer .= pack('d', $this->temperatureC);
        $buffer .= Serializer::int32($this->color);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $coordinates = MediaAreaCoordinates::deserialize($stream);
        $emoji = Deserializer::bytes($stream);
        $temperatureC = Deserializer::double($stream);
        $color = Deserializer::int32($stream);

        return new self(
            $coordinates,
            $emoji,
            $temperatureC,
            $color
        );
    }
}