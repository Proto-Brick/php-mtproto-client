<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\SavedReactionTag;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $tags = Deserializer::vectorOfObjects($__payload, $__offset, [SavedReactionTag::class, 'deserialize']);
        $hash = Deserializer::int64($__payload, $__offset);

        return new self(
            $tags,
            $hash
        );
    }
}