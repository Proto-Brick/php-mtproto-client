<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelMessagesFilter
 */
final class ChannelMessagesFilter extends AbstractChannelMessagesFilter
{
    public const CONSTRUCTOR_ID = 0xcd77d957;
    
    public string $predicate = 'channelMessagesFilter';
    
    /**
     * @param list<MessageRange> $ranges
     * @param true|null $excludeNewMessages
     */
    public function __construct(
        public readonly array $ranges,
        public readonly ?true $excludeNewMessages = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->excludeNewMessages) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfObjects($this->ranges);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $excludeNewMessages = (($flags & (1 << 1)) !== 0) ? true : null;
        $ranges = Deserializer::vectorOfObjects($__payload, $__offset, [MessageRange::class, 'deserialize']);

        return new self(
            $ranges,
            $excludeNewMessages
        );
    }
}