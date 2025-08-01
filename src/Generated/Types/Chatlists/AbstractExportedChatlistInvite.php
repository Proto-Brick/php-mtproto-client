<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Chatlists;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/chatlists.ExportedChatlistInvite
 */
abstract class AbstractExportedChatlistInvite extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            ExportedChatlistInvite::CONSTRUCTOR_ID => ExportedChatlistInvite::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type chatlists.ExportedChatlistInvite: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}