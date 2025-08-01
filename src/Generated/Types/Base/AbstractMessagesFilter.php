<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/MessagesFilter
 */
abstract class AbstractMessagesFilter extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InputMessagesFilterEmpty::CONSTRUCTOR_ID => InputMessagesFilterEmpty::deserialize($deserializer, $stream),
            InputMessagesFilterPhotos::CONSTRUCTOR_ID => InputMessagesFilterPhotos::deserialize($deserializer, $stream),
            InputMessagesFilterVideo::CONSTRUCTOR_ID => InputMessagesFilterVideo::deserialize($deserializer, $stream),
            InputMessagesFilterPhotoVideo::CONSTRUCTOR_ID => InputMessagesFilterPhotoVideo::deserialize($deserializer, $stream),
            InputMessagesFilterDocument::CONSTRUCTOR_ID => InputMessagesFilterDocument::deserialize($deserializer, $stream),
            InputMessagesFilterUrl::CONSTRUCTOR_ID => InputMessagesFilterUrl::deserialize($deserializer, $stream),
            InputMessagesFilterGif::CONSTRUCTOR_ID => InputMessagesFilterGif::deserialize($deserializer, $stream),
            InputMessagesFilterVoice::CONSTRUCTOR_ID => InputMessagesFilterVoice::deserialize($deserializer, $stream),
            InputMessagesFilterMusic::CONSTRUCTOR_ID => InputMessagesFilterMusic::deserialize($deserializer, $stream),
            InputMessagesFilterChatPhotos::CONSTRUCTOR_ID => InputMessagesFilterChatPhotos::deserialize($deserializer, $stream),
            InputMessagesFilterPhoneCalls::CONSTRUCTOR_ID => InputMessagesFilterPhoneCalls::deserialize($deserializer, $stream),
            InputMessagesFilterRoundVoice::CONSTRUCTOR_ID => InputMessagesFilterRoundVoice::deserialize($deserializer, $stream),
            InputMessagesFilterRoundVideo::CONSTRUCTOR_ID => InputMessagesFilterRoundVideo::deserialize($deserializer, $stream),
            InputMessagesFilterMyMentions::CONSTRUCTOR_ID => InputMessagesFilterMyMentions::deserialize($deserializer, $stream),
            InputMessagesFilterGeo::CONSTRUCTOR_ID => InputMessagesFilterGeo::deserialize($deserializer, $stream),
            InputMessagesFilterContacts::CONSTRUCTOR_ID => InputMessagesFilterContacts::deserialize($deserializer, $stream),
            InputMessagesFilterPinned::CONSTRUCTOR_ID => InputMessagesFilterPinned::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type MessagesFilter: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}