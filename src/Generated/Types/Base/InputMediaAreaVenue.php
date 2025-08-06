<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaAreaVenue
 */
final class InputMediaAreaVenue extends AbstractMediaArea
{
    public const CONSTRUCTOR_ID = 0xb282217f;
    
    public string $_ = 'inputMediaAreaVenue';
    
    /**
     * @param MediaAreaCoordinates $coordinates
     * @param int $queryId
     * @param string $resultId
     */
    public function __construct(
        public readonly MediaAreaCoordinates $coordinates,
        public readonly int $queryId,
        public readonly string $resultId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->coordinates->serialize($serializer);
        $buffer .= $serializer->int64($this->queryId);
        $buffer .= $serializer->bytes($this->resultId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $coordinates = MediaAreaCoordinates::deserialize($deserializer, $stream);
        $queryId = $deserializer->int64($stream);
        $resultId = $deserializer->bytes($stream);
        return new self(
            $coordinates,
            $queryId,
            $resultId
        );
    }
}