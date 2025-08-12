<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/MessageEntity
 */
abstract class AbstractMessageEntity extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            MessageEntityUnknown::CONSTRUCTOR_ID => MessageEntityUnknown::deserialize($stream),
            MessageEntityMention::CONSTRUCTOR_ID => MessageEntityMention::deserialize($stream),
            MessageEntityHashtag::CONSTRUCTOR_ID => MessageEntityHashtag::deserialize($stream),
            MessageEntityBotCommand::CONSTRUCTOR_ID => MessageEntityBotCommand::deserialize($stream),
            MessageEntityUrl::CONSTRUCTOR_ID => MessageEntityUrl::deserialize($stream),
            MessageEntityEmail::CONSTRUCTOR_ID => MessageEntityEmail::deserialize($stream),
            MessageEntityBold::CONSTRUCTOR_ID => MessageEntityBold::deserialize($stream),
            MessageEntityItalic::CONSTRUCTOR_ID => MessageEntityItalic::deserialize($stream),
            MessageEntityCode::CONSTRUCTOR_ID => MessageEntityCode::deserialize($stream),
            MessageEntityPre::CONSTRUCTOR_ID => MessageEntityPre::deserialize($stream),
            MessageEntityTextUrl::CONSTRUCTOR_ID => MessageEntityTextUrl::deserialize($stream),
            MessageEntityMentionName::CONSTRUCTOR_ID => MessageEntityMentionName::deserialize($stream),
            InputMessageEntityMentionName::CONSTRUCTOR_ID => InputMessageEntityMentionName::deserialize($stream),
            MessageEntityPhone::CONSTRUCTOR_ID => MessageEntityPhone::deserialize($stream),
            MessageEntityCashtag::CONSTRUCTOR_ID => MessageEntityCashtag::deserialize($stream),
            MessageEntityUnderline::CONSTRUCTOR_ID => MessageEntityUnderline::deserialize($stream),
            MessageEntityStrike::CONSTRUCTOR_ID => MessageEntityStrike::deserialize($stream),
            MessageEntityBankCard::CONSTRUCTOR_ID => MessageEntityBankCard::deserialize($stream),
            MessageEntitySpoiler::CONSTRUCTOR_ID => MessageEntitySpoiler::deserialize($stream),
            MessageEntityCustomEmoji::CONSTRUCTOR_ID => MessageEntityCustomEmoji::deserialize($stream),
            MessageEntityBlockquote::CONSTRUCTOR_ID => MessageEntityBlockquote::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type MessageEntity. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}