<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\SavedReactionTag;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.savedReactionTags
 */
final class SavedReactionTags extends AbstractSavedReactionTags
{
    public const CONSTRUCTOR_ID = 0x3259950a;
    
    public string $_ = 'messages.savedReactionTags';
    
    /**
     * @param list<SavedReactionTag> $tags
     * @param int $hash
     */
    public function __construct(
        public readonly array $tags,
        public readonly int $hash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->tags);
        $buffer .= $serializer->int64($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $tags = $deserializer->vectorOfObjects($stream, [SavedReactionTag::class, 'deserialize']);
        $hash = $deserializer->int64($stream);
        return new self(
            $tags,
            $hash
        );
    }
}