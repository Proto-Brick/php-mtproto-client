<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateReadChannelDiscussionOutbox
 */
final class UpdateReadChannelDiscussionOutbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x695c9e7c;
    
    public string $_ = 'updateReadChannelDiscussionOutbox';
    
    /**
     * @param int $channelId
     * @param int $topMsgId
     * @param int $readMaxId
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $topMsgId,
        public readonly int $readMaxId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->channelId);
        $buffer .= $serializer->int32($this->topMsgId);
        $buffer .= $serializer->int32($this->readMaxId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $channelId = $deserializer->int64($stream);
        $topMsgId = $deserializer->int32($stream);
        $readMaxId = $deserializer->int32($stream);
        return new self(
            $channelId,
            $topMsgId,
            $readMaxId
        );
    }
}