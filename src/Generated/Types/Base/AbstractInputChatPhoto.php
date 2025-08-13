<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


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
            0x1ca48f57 => InputChatPhotoEmpty::deserialize($stream),
            0xbdcdaec0 => InputChatUploadedPhoto::deserialize($stream),
            0x8953ad37 => InputChatPhoto::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type InputChatPhoto. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}