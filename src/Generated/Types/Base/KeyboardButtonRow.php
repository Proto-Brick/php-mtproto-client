<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/keyboardButtonRow
 */
final class KeyboardButtonRow extends TlObject
{
    public const CONSTRUCTOR_ID = 0x77608b83;
    
    public string $predicate = 'keyboardButtonRow';
    
    /**
     * @param list<AbstractKeyboardButton> $buttons
     */
    public function __construct(
        public readonly array $buttons
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->buttons);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $buttons = Deserializer::vectorOfObjects($stream, [AbstractKeyboardButton::class, 'deserialize']);

        return new self(
            $buttons
        );
    }
}