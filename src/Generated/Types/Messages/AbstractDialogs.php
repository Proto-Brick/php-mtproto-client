<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/messages.Dialogs
 */
abstract class AbstractDialogs extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            Dialogs::CONSTRUCTOR_ID => Dialogs::deserialize($deserializer, $stream),
            DialogsSlice::CONSTRUCTOR_ID => DialogsSlice::deserialize($deserializer, $stream),
            DialogsNotModified::CONSTRUCTOR_ID => DialogsNotModified::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type messages.Dialogs: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}