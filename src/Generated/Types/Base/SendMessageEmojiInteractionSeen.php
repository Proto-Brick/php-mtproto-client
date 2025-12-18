<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/sendMessageEmojiInteractionSeen
 */
final class SendMessageEmojiInteractionSeen extends AbstractSendMessageAction
{
    public const CONSTRUCTOR_ID = 0xb665902e;
    
    public string $predicate = 'sendMessageEmojiInteractionSeen';
    
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
        $__offset += 4; // Constructor ID
        $emoticon = Deserializer::bytes($__payload, $__offset);

        return new self(
            $emoticon
        );
    }
}