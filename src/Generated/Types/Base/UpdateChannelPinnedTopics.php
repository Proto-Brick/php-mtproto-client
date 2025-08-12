<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChannelPinnedTopics
 */
final class UpdateChannelPinnedTopics extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xfe198602;
    
    public string $predicate = 'updateChannelPinnedTopics';
    
    /**
     * @param int $channelId
     * @param list<int>|null $order
     */
    public function __construct(
        public readonly int $channelId,
        public readonly ?array $order = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->order !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->channelId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfInts($this->order);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $channelId = Deserializer::int64($stream);
        $order = ($flags & (1 << 0)) ? Deserializer::vectorOfInts($stream) : null;

        return new self(
            $channelId,
            $order
        );
    }
}