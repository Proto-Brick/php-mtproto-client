<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatReactionsSome
 */
final class ChatReactionsSome extends AbstractChatReactions
{
    public const CONSTRUCTOR_ID = 0x661d4037;
    
    public string $predicate = 'chatReactionsSome';
    
    /**
     * @param list<AbstractReaction> $reactions
     */
    public function __construct(
        public readonly array $reactions
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->reactions);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $reactions = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractReaction::class, 'deserialize']);

        return new self(
            $reactions
        );
    }
}