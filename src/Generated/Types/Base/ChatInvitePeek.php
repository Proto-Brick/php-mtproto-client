<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatInvitePeek
 */
final class ChatInvitePeek extends AbstractChatInvite
{
    public const CONSTRUCTOR_ID = 0x61695cb0;
    
    public string $predicate = 'chatInvitePeek';
    
    /**
     * @param AbstractChat $chat
     * @param int $expires
     */
    public function __construct(
        public readonly AbstractChat $chat,
        public readonly int $expires
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chat->serialize();
        $buffer .= Serializer::int32($this->expires);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $chat = AbstractChat::deserialize($__payload, $__offset);
        $expires = Deserializer::int32($__payload, $__offset);

        return new self(
            $chat,
            $expires
        );
    }
}