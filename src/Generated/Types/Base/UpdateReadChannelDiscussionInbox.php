<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateReadChannelDiscussionInbox
 */
final class UpdateReadChannelDiscussionInbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xd6b19546;
    
    public string $_ = 'updateReadChannelDiscussionInbox';
    
    /**
     * @param int $channelId
     * @param int $topMsgId
     * @param int $readMaxId
     * @param int|null $broadcastId
     * @param int|null $broadcastPost
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $topMsgId,
        public readonly int $readMaxId,
        public readonly ?int $broadcastId = null,
        public readonly ?int $broadcastPost = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->broadcastId !== null) $flags |= (1 << 0);
        if ($this->broadcastPost !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->channelId);
        $buffer .= $serializer->int32($this->topMsgId);
        $buffer .= $serializer->int32($this->readMaxId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->broadcastId);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->broadcastPost);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $channelId = $deserializer->int64($stream);
        $topMsgId = $deserializer->int32($stream);
        $readMaxId = $deserializer->int32($stream);
        $broadcastId = ($flags & (1 << 0)) ? $deserializer->int64($stream) : null;
        $broadcastPost = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        return new self(
            $channelId,
            $topMsgId,
            $readMaxId,
            $broadcastId,
            $broadcastPost
        );
    }
}