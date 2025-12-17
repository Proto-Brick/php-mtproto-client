<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionSetChatTheme
 */
final class MessageActionSetChatTheme extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xaa786345;
    
    public string $predicate = 'messageActionSetChatTheme';
    
    /**
     * @param string $emoticon
     */
    public function __construct(
        public readonly string $emoticon
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->emoticon);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $emoticon = Deserializer::bytes($__payload, $__offset);

        return new self(
            $emoticon
        );
    }
}