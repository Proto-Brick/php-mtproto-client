<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Upload;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/upload.File
 */
abstract class AbstractFile extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            File::CONSTRUCTOR_ID => File::deserialize($deserializer, $stream),
            FileCdnRedirect::CONSTRUCTOR_ID => FileCdnRedirect::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type upload.File: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}