<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/keyboardButtonUrlAuth
 */
final class KeyboardButtonUrlAuth extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0x10b78d29;
    
    public string $predicate = 'keyboardButtonUrlAuth';
    
    /**
     * @param string $text
     * @param string $url
     * @param int $buttonId
     * @param string|null $fwdText
     */
    public function __construct(
        public readonly string $text,
        public readonly string $url,
        public readonly int $buttonId,
        public readonly ?string $fwdText = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fwdText !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->text);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->fwdText);
        }
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int32($this->buttonId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $text = Deserializer::bytes($stream);
        $fwdText = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $url = Deserializer::bytes($stream);
        $buttonId = Deserializer::int32($stream);

        return new self(
            $text,
            $url,
            $buttonId,
            $fwdText
        );
    }
}