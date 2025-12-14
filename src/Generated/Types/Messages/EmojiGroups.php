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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $groups = Deserializer::vectorOfObjects($stream, [AbstractEmojiGroup::class, 'deserialize']);

        return new self(
            $hash,
            $groups
        );
    }
}