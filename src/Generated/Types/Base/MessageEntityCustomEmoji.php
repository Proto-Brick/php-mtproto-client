<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageEntityCustomEmoji
 */
final class MessageEntityCustomEmoji extends AbstractMessageEntity
{
    public const CONSTRUCTOR_ID = 0xc8cf05f8;
    
    public string $predicate = 'messageEntityCustomEmoji';
    
    /**
     * @param int $offset
     * @param int $length
     * @param int $documentId
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $length,
        public readonly int $documentId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->length);
        $buffer .= Serializer::int64($this->documentId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $offset = Deserializer::int32($__payload, $__offset);
        $length = Deserializer::int32($__payload, $__offset);
        $documentId = Deserializer::int64($__payload, $__offset);

        return new self(
            $offset,
            $length,
            $documentId
        );
    }
}