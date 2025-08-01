<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Chatlists;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/chatlists.ExportedInvites
 */
abstract class AbstractExportedInvites extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            ExportedInvites::CONSTRUCTOR_ID => ExportedInvites::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type chatlists.ExportedInvites: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}