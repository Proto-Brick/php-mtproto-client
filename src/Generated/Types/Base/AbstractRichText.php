<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/RichText
 */
abstract class AbstractRichText extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xdc3d824f => TextEmpty::deserialize($stream),
            0x744694e0 => TextPlain::deserialize($stream),
            0x6724abc4 => TextBold::deserialize($stream),
            0xd912a59c => TextItalic::deserialize($stream),
            0xc12622c4 => TextUnderline::deserialize($stream),
            0x9bf8bb95 => TextStrike::deserialize($stream),
            0x6c3f19b9 => TextFixed::deserialize($stream),
            0x3c2884c1 => TextUrl::deserialize($stream),
            0xde5a0dd6 => TextEmail::deserialize($stream),
            0x7e6260d7 => TextConcat::deserialize($stream),
            0xed6a8504 => TextSubscript::deserialize($stream),
            0xc7fb5e01 => TextSuperscript::deserialize($stream),
            0x34b8621 => TextMarked::deserialize($stream),
            0x1ccb966a => TextPhone::deserialize($stream),
            0x81ccf4f => TextImage::deserialize($stream),
            0x35553762 => TextAnchor::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type RichText. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}