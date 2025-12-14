<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
        if ($this->folderId !== null) {
            $flags |= (1 << 0);
        }
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
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $folderId = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $channelId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $maxId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $stillUnreadCount = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $pts = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $channelId,
            $maxId,
            $stillUnreadCount,
            $pts,
            $folderId
        );
    }
}