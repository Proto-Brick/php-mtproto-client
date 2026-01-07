<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/searchResultPosition
 */
final class SearchResultsPosition extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7f648b67;
    
    public string $predicate = 'searchResultPosition';
    
    /**
     * @param int $msgId
     * @param int $date
     * @param int $offset
     */
    public function __construct(
        public readonly int $msgId,
        public readonly int $date,
        public readonly int $offset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->offset);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $msgId = Deserializer::int32($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $offset = Deserializer::int32($__payload, $__offset);

        return new self(
            $msgId,
            $date,
            $offset
        );
    }
}