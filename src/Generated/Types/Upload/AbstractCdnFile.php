<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Upload;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/upload.CdnFile
 */
abstract class AbstractCdnFile extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            CdnFileReuploadNeeded::CONSTRUCTOR_ID => CdnFileReuploadNeeded::deserialize($deserializer, $stream),
            CdnFile::CONSTRUCTOR_ID => CdnFile::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type upload.CdnFile. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}