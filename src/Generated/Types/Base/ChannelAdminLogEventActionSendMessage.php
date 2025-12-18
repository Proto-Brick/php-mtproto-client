<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionSendMessage
 */
final class ChannelAdminLogEventActionSendMessage extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x278f2868;
    
    public string $predicate = 'channelAdminLogEventActionSendMessage';
    
    /**
     * @param AbstractMessage $message
     */
    public function __construct(
        public readonly AbstractMessage $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->message->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $message = AbstractMessage::deserialize($__payload, $__offset);

        return new self(
            $message
        );
    }
}