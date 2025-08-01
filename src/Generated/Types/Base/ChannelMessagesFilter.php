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
    public const CONSTRUCTOR_ID = 3447183703;
    
    public string $_ = 'channelMessagesFilter';
    
    /**
     * @param list<AbstractMessageRange> $ranges
     * @param bool|null $excludeNewMessages
     */
    public function __construct(
        public readonly array $ranges,
        public readonly ?bool $excludeNewMessages = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->excludeNewMessages) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->vectorOfObjects($this->ranges);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $excludeNewMessages = ($flags & (1 << 1)) ? true : null;
        $ranges = $deserializer->vectorOfObjects($stream, [AbstractMessageRange::class, 'deserialize']);
            return new self(
            $ranges,
            $excludeNewMessages
        );
    }
}