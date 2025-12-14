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
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $chosenOrder = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $reaction = AbstractReaction::deserialize($stream);
        $count = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $reaction,
            $count,
            $chosenOrder
        );
    }
}