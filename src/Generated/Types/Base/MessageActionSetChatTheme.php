<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionSetChatTheme
 */
final class MessageActionSetChatTheme extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xb91bbd3a;
    
    public string $predicate = 'messageActionSetChatTheme';
    
    /**
     * @param AbstractChatTheme $theme
     */
    public function __construct(
        public readonly AbstractChatTheme $theme
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->theme->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $theme = AbstractChatTheme::deserialize($__payload, $__offset);

        return new self(
            $theme
        );
    }
}