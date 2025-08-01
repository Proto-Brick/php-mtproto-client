<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/keyboardButtonRow
 */
final class KeyboardButtonRow extends AbstractKeyboardButtonRow
{
    public const CONSTRUCTOR_ID = 2002815875;
    
    public string $_ = 'keyboardButtonRow';
    
    /**
     * @param list<AbstractKeyboardButton> $buttons
     */
    public function __construct(
        public readonly array $buttons
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->buttons);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $buttons = $deserializer->vectorOfObjects($stream, [AbstractKeyboardButton::class, 'deserialize']);
            return new self(
            $buttons
        );
    }
}