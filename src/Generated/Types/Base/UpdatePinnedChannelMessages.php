<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePinnedChannelMessages
 */
final class UpdatePinnedChannelMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x5bb98608;
    
    public string $_ = 'updatePinnedChannelMessages';
    
    /**
     * @param int $channelId
     * @param list<int> $messages
     * @param int $pts
     * @param int $ptsCount
     * @param bool|null $pinned
     */
    public function __construct(
        public readonly int $channelId,
        public readonly array $messages,
        public readonly int $pts,
        public readonly int $ptsCount,
        public readonly ?bool $pinned = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::vectorOfInts($this->messages);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $pinned = ($flags & (1 << 0)) ? true : null;
        $channelId = Deserializer::int64($stream);
        $messages = Deserializer::vectorOfInts($stream);
        $pts = Deserializer::int32($stream);
        $ptsCount = Deserializer::int32($stream);
        return new self(
            $channelId,
            $messages,
            $pts,
            $ptsCount,
            $pinned
        );
    }
}