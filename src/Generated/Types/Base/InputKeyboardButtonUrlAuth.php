<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputKeyboardButtonUrlAuth
 */
final class InputKeyboardButtonUrlAuth extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 3492708308;
    
    public string $_ = 'inputKeyboardButtonUrlAuth';
    
    /**
     * @param string $text
     * @param string $url
     * @param AbstractInputUser $bot
     * @param bool|null $requestWriteAccess
     * @param string|null $fwdText
     */
    public function __construct(
        public readonly string $text,
        public readonly string $url,
        public readonly AbstractInputUser $bot,
        public readonly ?bool $requestWriteAccess = null,
        public readonly ?string $fwdText = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requestWriteAccess) $flags |= (1 << 0);
        if ($this->fwdText !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->text);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->fwdText);
        }
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $this->bot->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $requestWriteAccess = ($flags & (1 << 0)) ? true : null;
        $text = $deserializer->bytes($stream);
        $fwdText = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $url = $deserializer->bytes($stream);
        $bot = AbstractInputUser::deserialize($deserializer, $stream);
            return new self(
            $text,
            $url,
            $bot,
            $requestWriteAccess,
            $fwdText
        );
    }
}