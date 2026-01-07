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
    public static function deserialize(string $__payload, int &$__offset): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($__payload, $__offset);
        
        return match ($constructorId) {
            0xdc3d824f => TextEmpty::deserialize($__payload, $__offset),
            0x744694e0 => TextPlain::deserialize($__payload, $__offset),
            0x6724abc4 => TextBold::deserialize($__payload, $__offset),
            0xd912a59c => TextItalic::deserialize($__payload, $__offset),
            0xc12622c4 => TextUnderline::deserialize($__payload, $__offset),
            0x9bf8bb95 => TextStrike::deserialize($__payload, $__offset),
            0x6c3f19b9 => TextFixed::deserialize($__payload, $__offset),
            0x3c2884c1 => TextUrl::deserialize($__payload, $__offset),
            0xde5a0dd6 => TextEmail::deserialize($__payload, $__offset),
            0x7e6260d7 => TextConcat::deserialize($__payload, $__offset),
            0xed6a8504 => TextSubscript::deserialize($__payload, $__offset),
            0xc7fb5e01 => TextSuperscript::deserialize($__payload, $__offset),
            0x34b8621 => TextMarked::deserialize($__payload, $__offset),
            0x1ccb966a => TextPhone::deserialize($__payload, $__offset),
            0x81ccf4f => TextImage::deserialize($__payload, $__offset),
            0x35553762 => TextAnchor::deserialize($__payload, $__offset),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type RichText. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }

}