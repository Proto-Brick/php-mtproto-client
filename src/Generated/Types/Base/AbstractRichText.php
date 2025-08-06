<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/RichText
 */
abstract class AbstractRichText extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        return match ($constructorId) {
            TextEmpty::CONSTRUCTOR_ID => TextEmpty::deserialize($deserializer, $stream),
            TextPlain::CONSTRUCTOR_ID => TextPlain::deserialize($deserializer, $stream),
            TextBold::CONSTRUCTOR_ID => TextBold::deserialize($deserializer, $stream),
            TextItalic::CONSTRUCTOR_ID => TextItalic::deserialize($deserializer, $stream),
            TextUnderline::CONSTRUCTOR_ID => TextUnderline::deserialize($deserializer, $stream),
            TextStrike::CONSTRUCTOR_ID => TextStrike::deserialize($deserializer, $stream),
            TextFixed::CONSTRUCTOR_ID => TextFixed::deserialize($deserializer, $stream),
            TextUrl::CONSTRUCTOR_ID => TextUrl::deserialize($deserializer, $stream),
            TextEmail::CONSTRUCTOR_ID => TextEmail::deserialize($deserializer, $stream),
            TextConcat::CONSTRUCTOR_ID => TextConcat::deserialize($deserializer, $stream),
            TextSubscript::CONSTRUCTOR_ID => TextSubscript::deserialize($deserializer, $stream),
            TextSuperscript::CONSTRUCTOR_ID => TextSuperscript::deserialize($deserializer, $stream),
            TextMarked::CONSTRUCTOR_ID => TextMarked::deserialize($deserializer, $stream),
            TextPhone::CONSTRUCTOR_ID => TextPhone::deserialize($deserializer, $stream),
            TextImage::CONSTRUCTOR_ID => TextImage::deserialize($deserializer, $stream),
            TextAnchor::CONSTRUCTOR_ID => TextAnchor::deserialize($deserializer, $stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type RichText. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}