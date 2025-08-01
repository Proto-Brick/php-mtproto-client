<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/mediaAreaUrl
 */
final class MediaAreaUrl extends AbstractMediaArea
{
    public const CONSTRUCTOR_ID = 926421125;
    
    public string $_ = 'mediaAreaUrl';
    
    /**
     * @param AbstractMediaAreaCoordinates $coordinates
     * @param string $url
     */
    public function __construct(
        public readonly AbstractMediaAreaCoordinates $coordinates,
        public readonly string $url
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->coordinates->serialize($serializer);
        $buffer .= $serializer->bytes($this->url);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $coordinates = AbstractMediaAreaCoordinates::deserialize($deserializer, $stream);
        $url = $deserializer->bytes($stream);
            return new self(
            $coordinates,
            $url
        );
    }
}