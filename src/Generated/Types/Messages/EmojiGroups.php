<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiGroup;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.emojiGroups
 */
final class EmojiGroups extends AbstractEmojiGroups
{
    public const CONSTRUCTOR_ID = 0x881fb94b;
    
    public string $predicate = 'messages.emojiGroups';
    
    /**
     * @param int $hash
     * @param list<AbstractEmojiGroup> $groups
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $groups
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->groups);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $hash = Deserializer::int32($__payload, $__offset);
        $groups = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractEmojiGroup::class, 'deserialize']);

        return new self(
            $hash,
            $groups
        );
    }
}