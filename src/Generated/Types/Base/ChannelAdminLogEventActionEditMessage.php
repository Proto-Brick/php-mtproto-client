<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionEditMessage
 */
final class ChannelAdminLogEventActionEditMessage extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x709b2405;
    
    public string $predicate = 'channelAdminLogEventActionEditMessage';
    
    /**
     * @param AbstractMessage $prevMessage
     * @param AbstractMessage $newMessage
     */
    public function __construct(
        public readonly AbstractMessage $prevMessage,
        public readonly AbstractMessage $newMessage
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevMessage->serialize();
        $buffer .= $this->newMessage->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevMessage = AbstractMessage::deserialize($stream);
        $newMessage = AbstractMessage::deserialize($stream);

        return new self(
            $prevMessage,
            $newMessage
        );
    }
}