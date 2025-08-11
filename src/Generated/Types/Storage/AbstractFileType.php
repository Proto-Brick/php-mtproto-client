<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Storage;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/storage.FileType
 */
abstract class AbstractFileType extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            FileUnknown::CONSTRUCTOR_ID => FileUnknown::deserialize($stream),
            FilePartial::CONSTRUCTOR_ID => FilePartial::deserialize($stream),
            FileJpeg::CONSTRUCTOR_ID => FileJpeg::deserialize($stream),
            FileGif::CONSTRUCTOR_ID => FileGif::deserialize($stream),
            FilePng::CONSTRUCTOR_ID => FilePng::deserialize($stream),
            FilePdf::CONSTRUCTOR_ID => FilePdf::deserialize($stream),
            FileMp3::CONSTRUCTOR_ID => FileMp3::deserialize($stream),
            FileMov::CONSTRUCTOR_ID => FileMov::deserialize($stream),
            FileMp4::CONSTRUCTOR_ID => FileMp4::deserialize($stream),
            FileWebp::CONSTRUCTOR_ID => FileWebp::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type storage.FileType. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}