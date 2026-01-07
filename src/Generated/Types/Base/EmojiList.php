<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/emojiList
 */
final class EmojiList extends AbstractEmojiList
{
    public const CONSTRUCTOR_ID = 0x7a1e11d1;
    
    public string $predicate = 'emojiList';
    
    /**
     * @param int $hash
     * @param list<int> $documentId
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $documentId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfLongs($this->documentId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $hash = Deserializer::int64($__payload, $__offset);
        $documentId = Deserializer::vectorOfLongs($__payload, $__offset);

        return new self(
            $hash,
            $documentId
        );
    }
}