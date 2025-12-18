<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputBotInlineMessageGame
 */
final class InputBotInlineMessageGame extends AbstractInputBotInlineMessage
{
    public const CONSTRUCTOR_ID = 0x4b425864;
    
    public string $predicate = 'inputBotInlineMessageGame';
    
    /**
     * @param AbstractReplyMarkup|null $replyMarkup
     */
    public function __construct(
        public readonly ?AbstractReplyMarkup $replyMarkup = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->replyMarkup !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $replyMarkup = (($flags & (1 << 2)) !== 0) ? AbstractReplyMarkup::deserialize($__payload, $__offset) : null;

        return new self(
            $replyMarkup
        );
    }
}