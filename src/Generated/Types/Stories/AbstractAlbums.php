<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stories;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/stories.Albums
 */
abstract class AbstractAlbums extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            AlbumsNotModified::CONSTRUCTOR_ID => AlbumsNotModified::deserialize($stream),
            Albums::CONSTRUCTOR_ID => Albums::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type stories.Albums. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}