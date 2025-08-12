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
    
    public string $predicate = 'inputMediaAreaVenue';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->coordinates->serialize();
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::bytes($this->resultId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $coordinates = MediaAreaCoordinates::deserialize($stream);
        $queryId = Deserializer::int64($stream);
        $resultId = Deserializer::bytes($stream);

        return new self(
            $coordinates,
            $queryId,
            $resultId
        );
    }
}