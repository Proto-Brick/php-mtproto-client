<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
        if ($this->excludeNewMessages) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfObjects($this->ranges);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $excludeNewMessages = ($flags & (1 << 1)) ? true : null;
        $ranges = Deserializer::vectorOfObjects($stream, [MessageRange::class, 'deserialize']);

        return new self(
            $ranges,
            $excludeNewMessages
        );
    }
}