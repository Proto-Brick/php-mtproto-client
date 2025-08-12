<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateReadChannelInbox
 */
final class UpdateReadChannelInbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x922e6e10;
    
    public string $predicate = 'updateReadChannelInbox';
    
    /**
     * @param int $channelId
     * @param int $maxId
     * @param int $stillUnreadCount
     * @param int $pts
     * @param int|null $folderId
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $maxId,
        public readonly int $stillUnreadCount,
        public readonly int $pts,
        public readonly ?int $folderId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->folderId !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->folderId);
        }
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int32($this->maxId);
        $buffer .= Serializer::int32($this->stillUnreadCount);
        $buffer .= Serializer::int32($this->pts);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $folderId = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $channelId = Deserializer::int64($stream);
        $maxId = Deserializer::int32($stream);
        $stillUnreadCount = Deserializer::int32($stream);
        $pts = Deserializer::int32($stream);

        return new self(
            $channelId,
            $maxId,
            $stillUnreadCount,
            $pts,
            $folderId
        );
    }
}