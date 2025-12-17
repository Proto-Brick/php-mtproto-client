<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatePinnedChannelMessages
 */
final class UpdatePinnedChannelMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x5bb98608;
    
    public string $predicate = 'updatePinnedChannelMessages';
    
    /**
     * @param int $channelId
     * @param list<int> $messages
     * @param int $pts
     * @param int $ptsCount
     * @param true|null $pinned
     */
    public function __construct(
        public readonly int $channelId,
        public readonly array $messages,
        public readonly int $pts,
        public readonly int $ptsCount,
        public readonly ?true $pinned = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::vectorOfInts($this->messages);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $pinned = (($flags & (1 << 0)) !== 0) ? true : null;
        $channelId = Deserializer::int64($__payload, $__offset);
        $messages = Deserializer::vectorOfInts($__payload, $__offset);
        $pts = Deserializer::int32($__payload, $__offset);
        $ptsCount = Deserializer::int32($__payload, $__offset);

        return new self(
            $channelId,
            $messages,
            $pts,
            $ptsCount,
            $pinned
        );
    }
}