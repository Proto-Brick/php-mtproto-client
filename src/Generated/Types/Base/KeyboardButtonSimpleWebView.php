<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/keyboardButtonSimpleWebView
 */
final class KeyboardButtonSimpleWebView extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0xa0c0505c;
    
    public string $_ = 'keyboardButtonSimpleWebView';
    
    /**
     * @param string $text
     * @param string $url
     */
    public function __construct(
        public readonly string $text,
        public readonly string $url
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->text);
        $buffer .= $serializer->bytes($this->url);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = $deserializer->bytes($stream);
        $url = $deserializer->bytes($stream);
        return new self(
            $text,
            $url
        );
    }
}