<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputPeer
 */
abstract class AbstractInputPeer extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputPeerEmpty::CONSTRUCTOR_ID => InputPeerEmpty::deserialize($deserializer, $stream),
            InputPeerSelf::CONSTRUCTOR_ID => InputPeerSelf::deserialize($deserializer, $stream),
            InputPeerChat::CONSTRUCTOR_ID => InputPeerChat::deserialize($deserializer, $stream),
            InputPeerUser::CONSTRUCTOR_ID => InputPeerUser::deserialize($deserializer, $stream),
            InputPeerChannel::CONSTRUCTOR_ID => InputPeerChannel::deserialize($deserializer, $stream),
            InputPeerUserFromMessage::CONSTRUCTOR_ID => InputPeerUserFromMessage::deserialize($deserializer, $stream),
            InputPeerChannelFromMessage::CONSTRUCTOR_ID => InputPeerChannelFromMessage::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InputPeer: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}