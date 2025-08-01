<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/AttachMenuPeerType
 */
abstract class AbstractAttachMenuPeerType extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            AttachMenuPeerTypeSameBotPM::CONSTRUCTOR_ID => AttachMenuPeerTypeSameBotPM::deserialize($deserializer, $stream),
            AttachMenuPeerTypeBotPM::CONSTRUCTOR_ID => AttachMenuPeerTypeBotPM::deserialize($deserializer, $stream),
            AttachMenuPeerTypePM::CONSTRUCTOR_ID => AttachMenuPeerTypePM::deserialize($deserializer, $stream),
            AttachMenuPeerTypeChat::CONSTRUCTOR_ID => AttachMenuPeerTypeChat::deserialize($deserializer, $stream),
            AttachMenuPeerTypeBroadcast::CONSTRUCTOR_ID => AttachMenuPeerTypeBroadcast::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type AttachMenuPeerType: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}