<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/emojiStatus
 */
final class EmojiStatus extends AbstractEmojiStatus
{
    public const CONSTRUCTOR_ID = 0x929b619d;
    
    public string $_ = 'emojiStatus';
    
    /**
     * @param int $documentId
     */
    public function __construct(
        public readonly int $documentId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->documentId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $documentId = Deserializer::int64($stream);
        return new self(
            $documentId
        );
    }
}