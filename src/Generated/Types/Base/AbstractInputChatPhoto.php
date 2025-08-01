<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InputChatPhoto
 */
abstract class AbstractInputChatPhoto extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputChatPhotoEmpty::CONSTRUCTOR_ID => InputChatPhotoEmpty::deserialize($deserializer, $stream),
            InputChatUploadedPhoto::CONSTRUCTOR_ID => InputChatUploadedPhoto::deserialize($deserializer, $stream),
            InputChatPhoto::CONSTRUCTOR_ID => InputChatPhoto::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InputChatPhoto: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}