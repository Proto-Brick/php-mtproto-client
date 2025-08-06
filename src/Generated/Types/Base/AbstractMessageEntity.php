<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/MessageEntity
 */
abstract class AbstractMessageEntity extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            MessageEntityUnknown::CONSTRUCTOR_ID => MessageEntityUnknown::deserialize($deserializer, $stream),
            MessageEntityMention::CONSTRUCTOR_ID => MessageEntityMention::deserialize($deserializer, $stream),
            MessageEntityHashtag::CONSTRUCTOR_ID => MessageEntityHashtag::deserialize($deserializer, $stream),
            MessageEntityBotCommand::CONSTRUCTOR_ID => MessageEntityBotCommand::deserialize($deserializer, $stream),
            MessageEntityUrl::CONSTRUCTOR_ID => MessageEntityUrl::deserialize($deserializer, $stream),
            MessageEntityEmail::CONSTRUCTOR_ID => MessageEntityEmail::deserialize($deserializer, $stream),
            MessageEntityBold::CONSTRUCTOR_ID => MessageEntityBold::deserialize($deserializer, $stream),
            MessageEntityItalic::CONSTRUCTOR_ID => MessageEntityItalic::deserialize($deserializer, $stream),
            MessageEntityCode::CONSTRUCTOR_ID => MessageEntityCode::deserialize($deserializer, $stream),
            MessageEntityPre::CONSTRUCTOR_ID => MessageEntityPre::deserialize($deserializer, $stream),
            MessageEntityTextUrl::CONSTRUCTOR_ID => MessageEntityTextUrl::deserialize($deserializer, $stream),
            MessageEntityMentionName::CONSTRUCTOR_ID => MessageEntityMentionName::deserialize($deserializer, $stream),
            InputMessageEntityMentionName::CONSTRUCTOR_ID => InputMessageEntityMentionName::deserialize($deserializer, $stream),
            MessageEntityPhone::CONSTRUCTOR_ID => MessageEntityPhone::deserialize($deserializer, $stream),
            MessageEntityCashtag::CONSTRUCTOR_ID => MessageEntityCashtag::deserialize($deserializer, $stream),
            MessageEntityUnderline::CONSTRUCTOR_ID => MessageEntityUnderline::deserialize($deserializer, $stream),
            MessageEntityStrike::CONSTRUCTOR_ID => MessageEntityStrike::deserialize($deserializer, $stream),
            MessageEntityBankCard::CONSTRUCTOR_ID => MessageEntityBankCard::deserialize($deserializer, $stream),
            MessageEntitySpoiler::CONSTRUCTOR_ID => MessageEntitySpoiler::deserialize($deserializer, $stream),
            MessageEntityCustomEmoji::CONSTRUCTOR_ID => MessageEntityCustomEmoji::deserialize($deserializer, $stream),
            MessageEntityBlockquote::CONSTRUCTOR_ID => MessageEntityBlockquote::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type MessageEntity. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}