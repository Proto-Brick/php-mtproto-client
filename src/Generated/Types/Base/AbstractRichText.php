<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
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
            TextEmpty::CONSTRUCTOR_ID => TextEmpty::deserialize($stream),
            TextPlain::CONSTRUCTOR_ID => TextPlain::deserialize($stream),
            TextBold::CONSTRUCTOR_ID => TextBold::deserialize($stream),
            TextItalic::CONSTRUCTOR_ID => TextItalic::deserialize($stream),
            TextUnderline::CONSTRUCTOR_ID => TextUnderline::deserialize($stream),
            TextStrike::CONSTRUCTOR_ID => TextStrike::deserialize($stream),
            TextFixed::CONSTRUCTOR_ID => TextFixed::deserialize($stream),
            TextUrl::CONSTRUCTOR_ID => TextUrl::deserialize($stream),
            TextEmail::CONSTRUCTOR_ID => TextEmail::deserialize($stream),
            TextConcat::CONSTRUCTOR_ID => TextConcat::deserialize($stream),
            TextSubscript::CONSTRUCTOR_ID => TextSubscript::deserialize($stream),
            TextSuperscript::CONSTRUCTOR_ID => TextSuperscript::deserialize($stream),
            TextMarked::CONSTRUCTOR_ID => TextMarked::deserialize($stream),
            TextPhone::CONSTRUCTOR_ID => TextPhone::deserialize($stream),
            TextImage::CONSTRUCTOR_ID => TextImage::deserialize($stream),
            TextAnchor::CONSTRUCTOR_ID => TextAnchor::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type RichText. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}