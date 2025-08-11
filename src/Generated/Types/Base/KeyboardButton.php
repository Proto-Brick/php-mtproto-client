<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/keyboardButton
 */
final class KeyboardButton extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0xa2fa4880;
    
    public string $_ = 'keyboardButton';
    
    /**
     * @param string $text
     */
    public function __construct(
        public readonly string $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->text);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $text = Deserializer::bytes($stream);
        return new self(
            $text
        );
    }
}