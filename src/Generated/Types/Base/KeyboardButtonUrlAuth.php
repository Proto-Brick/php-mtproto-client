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
    public const CONSTRUCTOR_ID = 280464681;
    
    public string $_ = 'keyboardButtonUrlAuth';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fwdText !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->text);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->fwdText);
        }
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->int32($this->buttonId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $text = $deserializer->bytes($stream);
        $fwdText = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $url = $deserializer->bytes($stream);
        $buttonId = $deserializer->int32($stream);
            return new self(
            $text,
            $url,
            $buttonId,
            $fwdText
        );
    }
}