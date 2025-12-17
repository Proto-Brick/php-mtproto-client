<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/reactionCount
 */
final class ReactionCount extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa3d1cb80;
    
    public string $predicate = 'reactionCount';
    
    /**
     * @param AbstractReaction $reaction
     * @param int $count
     * @param int|null $chosenOrder
     */
    public function __construct(
        public readonly AbstractReaction $reaction,
        public readonly int $count,
        public readonly ?int $chosenOrder = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->chosenOrder !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->chosenOrder);
        }
        $buffer .= $this->reaction->serialize();
        $buffer .= Serializer::int32($this->count);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $chosenOrder = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $reaction = AbstractReaction::deserialize($__payload, $__offset);
        $count = Deserializer::int32($__payload, $__offset);

        return new self(
            $reaction,
            $count,
            $chosenOrder
        );
    }
}