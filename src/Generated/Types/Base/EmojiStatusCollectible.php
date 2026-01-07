<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/emojiStatusCollectible
 */
final class EmojiStatusCollectible extends AbstractEmojiStatus
{
    public const CONSTRUCTOR_ID = 0x7184603b;
    
    public string $predicate = 'emojiStatusCollectible';
    
    /**
     * @param int $collectibleId
     * @param int $documentId
     * @param string $title
     * @param string $slug
     * @param int $patternDocumentId
     * @param int $centerColor
     * @param int $edgeColor
     * @param int $patternColor
     * @param int $textColor
     * @param int|null $until
     */
    public function __construct(
        public readonly int $collectibleId,
        public readonly int $documentId,
        public readonly string $title,
        public readonly string $slug,
        public readonly int $patternDocumentId,
        public readonly int $centerColor,
        public readonly int $edgeColor,
        public readonly int $patternColor,
        public readonly int $textColor,
        public readonly ?int $until = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->until !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->collectibleId);
        $buffer .= Serializer::int64($this->documentId);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->slug);
        $buffer .= Serializer::int64($this->patternDocumentId);
        $buffer .= Serializer::int32($this->centerColor);
        $buffer .= Serializer::int32($this->edgeColor);
        $buffer .= Serializer::int32($this->patternColor);
        $buffer .= Serializer::int32($this->textColor);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->until);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $collectibleId = Deserializer::int64($__payload, $__offset);
        $documentId = Deserializer::int64($__payload, $__offset);
        $title = Deserializer::bytes($__payload, $__offset);
        $slug = Deserializer::bytes($__payload, $__offset);
        $patternDocumentId = Deserializer::int64($__payload, $__offset);
        $centerColor = Deserializer::int32($__payload, $__offset);
        $edgeColor = Deserializer::int32($__payload, $__offset);
        $patternColor = Deserializer::int32($__payload, $__offset);
        $textColor = Deserializer::int32($__payload, $__offset);
        $until = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $collectibleId,
            $documentId,
            $title,
            $slug,
            $patternDocumentId,
            $centerColor,
            $edgeColor,
            $patternColor,
            $textColor,
            $until
        );
    }
}