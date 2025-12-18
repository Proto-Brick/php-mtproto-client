<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/mediaAreaChannelPost
 */
final class MediaAreaChannelPost extends AbstractMediaArea
{
    public const CONSTRUCTOR_ID = 0x770416af;
    
    public string $predicate = 'mediaAreaChannelPost';
    
    /**
     * @param MediaAreaCoordinates $coordinates
     * @param int $channelId
     * @param int $msgId
     */
    public function __construct(
        public readonly MediaAreaCoordinates $coordinates,
        public readonly int $channelId,
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->coordinates->serialize();
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= Serializer::int32($this->msgId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $coordinates = MediaAreaCoordinates::deserialize($__payload, $__offset);
        $channelId = Deserializer::int64($__payload, $__offset);
        $msgId = Deserializer::int32($__payload, $__offset);

        return new self(
            $coordinates,
            $channelId,
            $msgId
        );
    }
}