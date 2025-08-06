<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/emojiStatusUntil
 */
final class EmojiStatusUntil extends AbstractEmojiStatus
{
    public const CONSTRUCTOR_ID = 0xfa30a8c7;
    
    public string $_ = 'emojiStatusUntil';
    
    /**
     * @param int $documentId
     * @param int $until
     */
    public function __construct(
        public readonly int $documentId,
        public readonly int $until
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->documentId);
        $buffer .= $serializer->int32($this->until);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $documentId = $deserializer->int64($stream);
        $until = $deserializer->int32($stream);
        return new self(
            $documentId,
            $until
        );
    }
}