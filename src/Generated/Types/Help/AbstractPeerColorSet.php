<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/help.PeerColorSet
 */
abstract class AbstractPeerColorSet extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            PeerColorSet::CONSTRUCTOR_ID => PeerColorSet::deserialize($deserializer, $stream),
            PeerColorProfileSet::CONSTRUCTOR_ID => PeerColorProfileSet::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type help.PeerColorSet: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}