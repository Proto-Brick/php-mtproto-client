<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputChannelFromMessage
 */
final class InputChannelFromMessage extends AbstractInputChannel
{
    public const CONSTRUCTOR_ID = 0x5b934f9d;
    
    public string $_ = 'inputChannelFromMessage';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param int $channelId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly int $channelId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int64($this->channelId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $peer = AbstractInputPeer::deserialize($stream);
        $msgId = Deserializer::int32($stream);
        $channelId = Deserializer::int64($stream);
        return new self(
            $peer,
            $msgId,
            $channelId
        );
    }
}