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
            InputMessagesFilterEmpty::CONSTRUCTOR_ID => InputMessagesFilterEmpty::deserialize($stream),
            InputMessagesFilterPhotos::CONSTRUCTOR_ID => InputMessagesFilterPhotos::deserialize($stream),
            InputMessagesFilterVideo::CONSTRUCTOR_ID => InputMessagesFilterVideo::deserialize($stream),
            InputMessagesFilterPhotoVideo::CONSTRUCTOR_ID => InputMessagesFilterPhotoVideo::deserialize($stream),
            InputMessagesFilterDocument::CONSTRUCTOR_ID => InputMessagesFilterDocument::deserialize($stream),
            InputMessagesFilterUrl::CONSTRUCTOR_ID => InputMessagesFilterUrl::deserialize($stream),
            InputMessagesFilterGif::CONSTRUCTOR_ID => InputMessagesFilterGif::deserialize($stream),
            InputMessagesFilterVoice::CONSTRUCTOR_ID => InputMessagesFilterVoice::deserialize($stream),
            InputMessagesFilterMusic::CONSTRUCTOR_ID => InputMessagesFilterMusic::deserialize($stream),
            InputMessagesFilterChatPhotos::CONSTRUCTOR_ID => InputMessagesFilterChatPhotos::deserialize($stream),
            InputMessagesFilterPhoneCalls::CONSTRUCTOR_ID => InputMessagesFilterPhoneCalls::deserialize($stream),
            InputMessagesFilterRoundVoice::CONSTRUCTOR_ID => InputMessagesFilterRoundVoice::deserialize($stream),
            InputMessagesFilterRoundVideo::CONSTRUCTOR_ID => InputMessagesFilterRoundVideo::deserialize($stream),
            InputMessagesFilterMyMentions::CONSTRUCTOR_ID => InputMessagesFilterMyMentions::deserialize($stream),
            InputMessagesFilterGeo::CONSTRUCTOR_ID => InputMessagesFilterGeo::deserialize($stream),
            InputMessagesFilterContacts::CONSTRUCTOR_ID => InputMessagesFilterContacts::deserialize($stream),
            InputMessagesFilterPinned::CONSTRUCTOR_ID => InputMessagesFilterPinned::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type MessagesFilter. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}