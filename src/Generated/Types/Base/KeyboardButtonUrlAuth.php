<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
        if ($this->fwdText !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->text);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->fwdText);
        }
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int32($this->buttonId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $text = Deserializer::bytes($__payload, $__offset);
        $fwdText = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $url = Deserializer::bytes($__payload, $__offset);
        $buttonId = Deserializer::int32($__payload, $__offset);

        return new self(
            $text,
            $url,
            $buttonId,
            $fwdText
        );
    }
}