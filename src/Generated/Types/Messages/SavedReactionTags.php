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
    
    public string $predicate = 'messages.savedReactionTags';
    
    /**
     * @param list<SavedReactionTag> $tags
     * @param int $hash
     */
    public function __construct(
        public readonly array $tags,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->tags);
        $buffer .= Serializer::int64($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $tags = Deserializer::vectorOfObjects($stream, [SavedReactionTag::class, 'deserialize']);
        $hash = Deserializer::int64($stream);

        return new self(
            $tags,
            $hash
        );
    }
}