<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/messages.StickerSet
 */
abstract class AbstractStickerSet extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            StickerSet::CONSTRUCTOR_ID => StickerSet::deserialize($deserializer, $stream),
            StickerSetNotModified::CONSTRUCTOR_ID => StickerSetNotModified::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type messages.StickerSet: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}