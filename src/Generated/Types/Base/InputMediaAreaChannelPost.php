<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaAreaChannelPost
 */
final class InputMediaAreaChannelPost extends AbstractMediaArea
{
    public const CONSTRUCTOR_ID = 0x2271f2bf;
    
    public string $predicate = 'inputMediaAreaChannelPost';
    
    /**
     * @param MediaAreaCoordinates $coordinates
     * @param AbstractInputChannel $channel
     * @param int $msgId
     */
    public function __construct(
        public readonly MediaAreaCoordinates $coordinates,
        public readonly AbstractInputChannel $channel,
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->coordinates->serialize();
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->msgId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $coordinates = MediaAreaCoordinates::deserialize($stream);
        $channel = AbstractInputChannel::deserialize($stream);
        $msgId = Deserializer::int32($stream);

        return new self(
            $coordinates,
            $channel,
            $msgId
        );
    }
}