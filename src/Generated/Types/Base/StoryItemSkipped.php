<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/storyItemSkipped
 */
final class StoryItemSkipped extends AbstractStoryItem
{
    public const CONSTRUCTOR_ID = 0xffadc913;
    
    public string $predicate = 'storyItemSkipped';
    
    /**
     * @param int $id
     * @param int $date
     * @param int $expireDate
     * @param true|null $closeFriends
     */
    public function __construct(
        public readonly int $id,
        public readonly int $date,
        public readonly int $expireDate,
        public readonly ?true $closeFriends = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->closeFriends) {
            $flags |= (1 << 8);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->expireDate);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $closeFriends = (($flags & (1 << 8)) !== 0) ? true : null;
        $id = Deserializer::int32($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $expireDate = Deserializer::int32($__payload, $__offset);

        return new self(
            $id,
            $date,
            $expireDate,
            $closeFriends
        );
    }
}