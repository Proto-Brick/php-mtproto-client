<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/keyboardButtonRequestPoll
 */
final class KeyboardButtonRequestPoll extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 3150401885;
    
    public string $_ = 'keyboardButtonRequestPoll';
    
    /**
     * @param string $text
     * @param bool|null $quiz
     */
    public function __construct(
        public readonly string $text,
        public readonly ?bool $quiz = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->quiz !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= ($this->quiz ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        $buffer .= $serializer->bytes($this->text);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $quiz = ($flags & (1 << 0)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $text = $deserializer->bytes($stream);
            return new self(
            $text,
            $quiz
        );
    }
}