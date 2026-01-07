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
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xbb92ba95 => MessageEntityUnknown::deserialize($__payload, $__offset),
            0xfa04579d => MessageEntityMention::deserialize($__payload, $__offset),
            0x6f635b0d => MessageEntityHashtag::deserialize($__payload, $__offset),
            0x6cef8ac7 => MessageEntityBotCommand::deserialize($__payload, $__offset),
            0x6ed02538 => MessageEntityUrl::deserialize($__payload, $__offset),
            0x64e475c2 => MessageEntityEmail::deserialize($__payload, $__offset),
            0xbd610bc9 => MessageEntityBold::deserialize($__payload, $__offset),
            0x826f8b60 => MessageEntityItalic::deserialize($__payload, $__offset),
            0x28a20571 => MessageEntityCode::deserialize($__payload, $__offset),
            0x73924be0 => MessageEntityPre::deserialize($__payload, $__offset),
            0x76a6d327 => MessageEntityTextUrl::deserialize($__payload, $__offset),
            0xdc7b1140 => MessageEntityMentionName::deserialize($__payload, $__offset),
            0x208e68c9 => InputMessageEntityMentionName::deserialize($__payload, $__offset),
            0x9b69e34b => MessageEntityPhone::deserialize($__payload, $__offset),
            0x4c4e743f => MessageEntityCashtag::deserialize($__payload, $__offset),
            0x9c4e7e8b => MessageEntityUnderline::deserialize($__payload, $__offset),
            0xbf0693d4 => MessageEntityStrike::deserialize($__payload, $__offset),
            0x761e6af4 => MessageEntityBankCard::deserialize($__payload, $__offset),
            0x32ca960f => MessageEntitySpoiler::deserialize($__payload, $__offset),
            0xc8cf05f8 => MessageEntityCustomEmoji::deserialize($__payload, $__offset),
            0xf1ccaaac => MessageEntityBlockquote::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type MessageEntity. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}