<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/keyboardButtonCopy
 */
final class KeyboardButtonCopy extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0x75d2698e;
    
    public string $predicate = 'keyboardButtonCopy';
    
    /**
     * @param string $text
     * @param string $copyText
     */
    public function __construct(
        public readonly string $text,
        public readonly string $copyText
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::bytes($this->copyText);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $text = Deserializer::bytes($stream);
        $copyText = Deserializer::bytes($stream);

        return new self(
            $text,
            $copyText
        );
    }
}