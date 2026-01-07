<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AvailableReaction;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.availableReactions
 */
final class AvailableReactions extends AbstractAvailableReactions
{
    public const CONSTRUCTOR_ID = 0x768e3aad;
    
    public string $predicate = 'messages.availableReactions';
    
    /**
     * @param int $hash
     * @param list<AvailableReaction> $reactions
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $reactions
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->reactions);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $hash = Deserializer::int32($__payload, $__offset);
        $reactions = Deserializer::vectorOfObjects($__payload, $__offset, [AvailableReaction::class, 'deserialize']);

        return new self(
            $hash,
            $reactions
        );
    }
}