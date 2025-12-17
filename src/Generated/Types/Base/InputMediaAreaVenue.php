<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $coordinates = MediaAreaCoordinates::deserialize($__payload, $__offset);
        $queryId = Deserializer::int64($__payload, $__offset);
        $resultId = Deserializer::bytes($__payload, $__offset);

        return new self(
            $coordinates,
            $queryId,
            $resultId
        );
    }
}