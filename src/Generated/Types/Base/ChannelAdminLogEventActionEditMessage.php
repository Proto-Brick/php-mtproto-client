<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionEditMessage
 */
final class ChannelAdminLogEventActionEditMessage extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 1889215493;
    
    public string $_ = 'channelAdminLogEventActionEditMessage';
    
    /**
     * @param AbstractMessage $prevMessage
     * @param AbstractMessage $newMessage
     */
    public function __construct(
        public readonly AbstractMessage $prevMessage,
        public readonly AbstractMessage $newMessage
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevMessage->serialize($serializer);
        $buffer .= $this->newMessage->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevMessage = AbstractMessage::deserialize($deserializer, $stream);
        $newMessage = AbstractMessage::deserialize($deserializer, $stream);
            return new self(
            $prevMessage,
            $newMessage
        );
    }
}