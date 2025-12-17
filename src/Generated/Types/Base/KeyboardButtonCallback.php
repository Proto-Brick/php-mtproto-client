<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/keyboardButtonCallback
 */
final class KeyboardButtonCallback extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0x35bbdb6b;
    
    public string $predicate = 'keyboardButtonCallback';
    
    /**
     * @param string $text
     * @param string $data
     * @param true|null $requiresPassword
     */
    public function __construct(
        public readonly string $text,
        public readonly string $data,
        public readonly ?true $requiresPassword = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requiresPassword) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::bytes($this->data);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $requiresPassword = (($flags & (1 << 0)) !== 0) ? true : null;
        $text = Deserializer::bytes($__payload, $__offset);
        $data = Deserializer::bytes($__payload, $__offset);

        return new self(
            $text,
            $data,
            $requiresPassword
        );
    }
}