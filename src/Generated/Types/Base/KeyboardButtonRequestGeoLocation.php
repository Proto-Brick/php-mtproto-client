<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/keyboardButtonRequestGeoLocation
 */
final class KeyboardButtonRequestGeoLocation extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0xfc796b3f;
    
    public string $predicate = 'keyboardButtonRequestGeoLocation';
    
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $text = Deserializer::bytes($__payload, $__offset);

        return new self(
            $text
        );
    }
}