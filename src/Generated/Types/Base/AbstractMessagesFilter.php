<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/MessagesFilter
 */
abstract class AbstractMessagesFilter extends TlObject
{
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0x57e2f66c => InputMessagesFilterEmpty::deserialize($__payload, $__offset),
            0x9609a51c => InputMessagesFilterPhotos::deserialize($__payload, $__offset),
            0x9fc00e65 => InputMessagesFilterVideo::deserialize($__payload, $__offset),
            0x56e9f0e4 => InputMessagesFilterPhotoVideo::deserialize($__payload, $__offset),
            0x9eddf188 => InputMessagesFilterDocument::deserialize($__payload, $__offset),
            0x7ef0dd87 => InputMessagesFilterUrl::deserialize($__payload, $__offset),
            0xffc86587 => InputMessagesFilterGif::deserialize($__payload, $__offset),
            0x50f5c392 => InputMessagesFilterVoice::deserialize($__payload, $__offset),
            0x3751b49e => InputMessagesFilterMusic::deserialize($__payload, $__offset),
            0x3a20ecb8 => InputMessagesFilterChatPhotos::deserialize($__payload, $__offset),
            0x80c99768 => InputMessagesFilterPhoneCalls::deserialize($__payload, $__offset),
            0x7a7c17a4 => InputMessagesFilterRoundVoice::deserialize($__payload, $__offset),
            0xb549da53 => InputMessagesFilterRoundVideo::deserialize($__payload, $__offset),
            0xc1f8e69a => InputMessagesFilterMyMentions::deserialize($__payload, $__offset),
            0xe7026d0d => InputMessagesFilterGeo::deserialize($__payload, $__offset),
            0xe062db83 => InputMessagesFilterContacts::deserialize($__payload, $__offset),
            0x1bb00451 => InputMessagesFilterPinned::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type MessagesFilter. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}