<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/PeerLocated
 */
abstract class AbstractPeerLocated extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            PeerLocated::CONSTRUCTOR_ID => PeerLocated::deserialize($deserializer, $stream),
            PeerSelfLocated::CONSTRUCTOR_ID => PeerSelfLocated::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type PeerLocated: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}