<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputPeer
 */
abstract class AbstractInputPeer extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InputPeerEmpty::CONSTRUCTOR_ID => InputPeerEmpty::deserialize($stream),
            InputPeerSelf::CONSTRUCTOR_ID => InputPeerSelf::deserialize($stream),
            InputPeerChat::CONSTRUCTOR_ID => InputPeerChat::deserialize($stream),
            InputPeerUser::CONSTRUCTOR_ID => InputPeerUser::deserialize($stream),
            InputPeerChannel::CONSTRUCTOR_ID => InputPeerChannel::deserialize($stream),
            InputPeerUserFromMessage::CONSTRUCTOR_ID => InputPeerUserFromMessage::deserialize($stream),
            InputPeerChannelFromMessage::CONSTRUCTOR_ID => InputPeerChannelFromMessage::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputPeer. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}