<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = Deserializer::int64($stream);
        $documentId = Deserializer::vectorOfLongs($stream);

        return new self(
            $hash,
            $documentId
        );
    }
}