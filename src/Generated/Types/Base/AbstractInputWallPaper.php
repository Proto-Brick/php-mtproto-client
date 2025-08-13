<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputWallPaper
 */
abstract class AbstractInputWallPaper extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xe630b979 => InputWallPaper::deserialize($stream),
            0x72091c80 => InputWallPaperSlug::deserialize($stream),
            0x967a462e => InputWallPaperNoFile::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputWallPaper. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}