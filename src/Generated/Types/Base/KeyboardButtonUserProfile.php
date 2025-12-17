<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/keyboardButtonUserProfile
 */
final class KeyboardButtonUserProfile extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0x308660c1;
    
    public string $predicate = 'keyboardButtonUserProfile';
    
    /**
     * @param string $text
     * @param int $userId
     */
    public function __construct(
        public readonly string $text,
        public readonly int $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::int64($this->userId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $text = Deserializer::bytes($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);

        return new self(
            $text,
            $userId
        );
    }
}