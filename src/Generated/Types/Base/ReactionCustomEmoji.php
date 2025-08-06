<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/reactionCustomEmoji
 */
final class ReactionCustomEmoji extends AbstractReaction
{
    public const CONSTRUCTOR_ID = 0x8935fc73;
    
    public string $_ = 'reactionCustomEmoji';
    
    /**
     * @param int $documentId
     */
    public function __construct(
        public readonly int $documentId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->documentId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $documentId = $deserializer->int64($stream);
        return new self(
            $documentId
        );
    }
}