<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $coordinates = MediaAreaCoordinates::deserialize($__payload, $__offset);
        $emoji = Deserializer::bytes($__payload, $__offset);
        $temperatureC = Deserializer::double($__payload, $__offset);
        $color = Deserializer::int32($__payload, $__offset);

        return new self(
            $coordinates,
            $emoji,
            $temperatureC,
            $color
        );
    }
}