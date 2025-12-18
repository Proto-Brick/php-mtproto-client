<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/replyKeyboardForceReply
 */
final class ReplyKeyboardForceReply extends AbstractReplyMarkup
{
    public const CONSTRUCTOR_ID = 0x86b40b08;
    
    public string $predicate = 'replyKeyboardForceReply';
    
    /**
     * @param true|null $singleUse
     * @param true|null $selective
     * @param string|null $placeholder
     */
    public function __construct(
        public readonly ?true $singleUse = null,
        public readonly ?true $selective = null,
        public readonly ?string $placeholder = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->singleUse) {
            $flags |= (1 << 1);
        }
        if ($this->selective) {
            $flags |= (1 << 2);
        }
        if ($this->placeholder !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->placeholder);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $singleUse = (($flags & (1 << 1)) !== 0) ? true : null;
        $selective = (($flags & (1 << 2)) !== 0) ? true : null;
        $placeholder = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $singleUse,
            $selective,
            $placeholder
        );
    }
}