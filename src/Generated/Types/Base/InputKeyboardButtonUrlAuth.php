<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputKeyboardButtonUrlAuth
 */
final class InputKeyboardButtonUrlAuth extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0xd02e7fd4;
    
    public string $predicate = 'inputKeyboardButtonUrlAuth';
    
    /**
     * @param string $text
     * @param string $url
     * @param AbstractInputUser $bot
     * @param true|null $requestWriteAccess
     * @param string|null $fwdText
     */
    public function __construct(
        public readonly string $text,
        public readonly string $url,
        public readonly AbstractInputUser $bot,
        public readonly ?true $requestWriteAccess = null,
        public readonly ?string $fwdText = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requestWriteAccess) {
            $flags |= (1 << 0);
        }
        if ($this->fwdText !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->text);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->fwdText);
        }
        $buffer .= Serializer::bytes($this->url);
        $buffer .= $this->bot->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $requestWriteAccess = (($flags & (1 << 0)) !== 0) ? true : null;
        $text = Deserializer::bytes($__payload, $__offset);
        $fwdText = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $url = Deserializer::bytes($__payload, $__offset);
        $bot = AbstractInputUser::deserialize($__payload, $__offset);

        return new self(
            $text,
            $url,
            $bot,
            $requestWriteAccess,
            $fwdText
        );
    }
}