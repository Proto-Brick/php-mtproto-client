<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/keyboardButtonRequestPhone
 */
final class KeyboardButtonRequestPhone extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0xb16a6c29;
    
    public string $predicate = 'keyboardButtonRequestPhone';
    
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
        Deserializer::int32($stream); // Constructor ID
        $text = Deserializer::bytes($stream);

        return new self(
            $text
        );
    }
}