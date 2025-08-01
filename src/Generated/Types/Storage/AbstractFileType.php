<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Storage;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/storage.FileType
 */
abstract class AbstractFileType extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            FileUnknown::CONSTRUCTOR_ID => FileUnknown::deserialize($deserializer, $stream),
            FilePartial::CONSTRUCTOR_ID => FilePartial::deserialize($deserializer, $stream),
            FileJpeg::CONSTRUCTOR_ID => FileJpeg::deserialize($deserializer, $stream),
            FileGif::CONSTRUCTOR_ID => FileGif::deserialize($deserializer, $stream),
            FilePng::CONSTRUCTOR_ID => FilePng::deserialize($deserializer, $stream),
            FilePdf::CONSTRUCTOR_ID => FilePdf::deserialize($deserializer, $stream),
            FileMp3::CONSTRUCTOR_ID => FileMp3::deserialize($deserializer, $stream),
            FileMov::CONSTRUCTOR_ID => FileMov::deserialize($deserializer, $stream),
            FileMp4::CONSTRUCTOR_ID => FileMp4::deserialize($deserializer, $stream),
            FileWebp::CONSTRUCTOR_ID => FileWebp::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type storage.FileType: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}