<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputFile
 */
abstract class AbstractInputFile extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            InputFile::CONSTRUCTOR_ID => InputFile::deserialize($deserializer, $stream),
            InputFileBig::CONSTRUCTOR_ID => InputFileBig::deserialize($deserializer, $stream),
            InputFileStoryDocument::CONSTRUCTOR_ID => InputFileStoryDocument::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputFile. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}