<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionChatJoinedByLink
 */
final class MessageActionChatJoinedByLink extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x31224c3;
    
    public string $predicate = 'messageActionChatJoinedByLink';
    
    /**
     * @param int $inviterId
     */
    public function __construct(
        public readonly int $inviterId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->inviterId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $inviterId = Deserializer::int64($__payload, $__offset);

        return new self(
            $inviterId
        );
    }
}