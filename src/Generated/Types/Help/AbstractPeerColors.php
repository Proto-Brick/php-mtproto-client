<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/help.PeerColors
 */
abstract class AbstractPeerColors extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            PeerColorsNotModified::CONSTRUCTOR_ID => PeerColorsNotModified::deserialize($deserializer, $stream),
            PeerColors::CONSTRUCTOR_ID => PeerColors::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type help.PeerColors: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}