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
    
    public string $_ = 'emojiList';
    
    /**
     * @param int $hash
     * @param list<int> $documentId
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $documentId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->hash);
        $buffer .= $serializer->vectorOfLongs($this->documentId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int64($stream);
        $documentId = $deserializer->vectorOfLongs($stream);
        return new self(
            $hash,
            $documentId
        );
    }
}