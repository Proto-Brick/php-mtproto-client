<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
        if ($this->until !== null) $flags |= (1 << 0);
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $collectibleId = Deserializer::int64($stream);
        $documentId = Deserializer::int64($stream);
        $title = Deserializer::bytes($stream);
        $slug = Deserializer::bytes($stream);
        $patternDocumentId = Deserializer::int64($stream);
        $centerColor = Deserializer::int32($stream);
        $edgeColor = Deserializer::int32($stream);
        $patternColor = Deserializer::int32($stream);
        $textColor = Deserializer::int32($stream);
        $until = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;

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