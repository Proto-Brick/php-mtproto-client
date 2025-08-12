<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputChatPhoto
 */
abstract class AbstractInputChatPhoto extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InputChatPhotoEmpty::CONSTRUCTOR_ID => InputChatPhotoEmpty::deserialize($stream),
            InputChatUploadedPhoto::CONSTRUCTOR_ID => InputChatUploadedPhoto::deserialize($stream),
            InputChatPhoto::CONSTRUCTOR_ID => InputChatPhoto::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InputChatPhoto. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}