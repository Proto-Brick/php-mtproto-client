<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/messages.StickerSetInstallResult
 */
abstract class AbstractStickerSetInstallResult extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            StickerSetInstallResultSuccess::CONSTRUCTOR_ID => StickerSetInstallResultSuccess::deserialize($stream),
            StickerSetInstallResultArchive::CONSTRUCTOR_ID => StickerSetInstallResultArchive::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type messages.StickerSetInstallResult. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}