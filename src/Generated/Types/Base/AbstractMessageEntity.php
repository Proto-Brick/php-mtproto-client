<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


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
            0xbb92ba95 => MessageEntityUnknown::deserialize($stream),
            0xfa04579d => MessageEntityMention::deserialize($stream),
            0x6f635b0d => MessageEntityHashtag::deserialize($stream),
            0x6cef8ac7 => MessageEntityBotCommand::deserialize($stream),
            0x6ed02538 => MessageEntityUrl::deserialize($stream),
            0x64e475c2 => MessageEntityEmail::deserialize($stream),
            0xbd610bc9 => MessageEntityBold::deserialize($stream),
            0x826f8b60 => MessageEntityItalic::deserialize($stream),
            0x28a20571 => MessageEntityCode::deserialize($stream),
            0x73924be0 => MessageEntityPre::deserialize($stream),
            0x76a6d327 => MessageEntityTextUrl::deserialize($stream),
            0xdc7b1140 => MessageEntityMentionName::deserialize($stream),
            0x208e68c9 => InputMessageEntityMentionName::deserialize($stream),
            0x9b69e34b => MessageEntityPhone::deserialize($stream),
            0x4c4e743f => MessageEntityCashtag::deserialize($stream),
            0x9c4e7e8b => MessageEntityUnderline::deserialize($stream),
            0xbf0693d4 => MessageEntityStrike::deserialize($stream),
            0x761e6af4 => MessageEntityBankCard::deserialize($stream),
            0x32ca960f => MessageEntitySpoiler::deserialize($stream),
            0xc8cf05f8 => MessageEntityCustomEmoji::deserialize($stream),
            0xf1ccaaac => MessageEntityBlockquote::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type MessageEntity. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}