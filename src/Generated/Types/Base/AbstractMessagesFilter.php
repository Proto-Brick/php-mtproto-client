<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/MessagesFilter
 */
abstract class AbstractMessagesFilter extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x57e2f66c => InputMessagesFilterEmpty::deserialize($stream),
            0x9609a51c => InputMessagesFilterPhotos::deserialize($stream),
            0x9fc00e65 => InputMessagesFilterVideo::deserialize($stream),
            0x56e9f0e4 => InputMessagesFilterPhotoVideo::deserialize($stream),
            0x9eddf188 => InputMessagesFilterDocument::deserialize($stream),
            0x7ef0dd87 => InputMessagesFilterUrl::deserialize($stream),
            0xffc86587 => InputMessagesFilterGif::deserialize($stream),
            0x50f5c392 => InputMessagesFilterVoice::deserialize($stream),
            0x3751b49e => InputMessagesFilterMusic::deserialize($stream),
            0x3a20ecb8 => InputMessagesFilterChatPhotos::deserialize($stream),
            0x80c99768 => InputMessagesFilterPhoneCalls::deserialize($stream),
            0x7a7c17a4 => InputMessagesFilterRoundVoice::deserialize($stream),
            0xb549da53 => InputMessagesFilterRoundVideo::deserialize($stream),
            0xc1f8e69a => InputMessagesFilterMyMentions::deserialize($stream),
            0xe7026d0d => InputMessagesFilterGeo::deserialize($stream),
            0xe062db83 => InputMessagesFilterContacts::deserialize($stream),
            0x1bb00451 => InputMessagesFilterPinned::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type MessagesFilter. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}