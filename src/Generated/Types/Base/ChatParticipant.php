<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatParticipant
 */
final class ChatParticipant extends AbstractChatParticipant
{
    public const CONSTRUCTOR_ID = 0xc02d4007;
    
    public string $predicate = 'chatParticipant';
    
    /**
     * @param int $userId
     * @param int $inviterId
     * @param int $date
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $inviterId,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int64($this->inviterId);
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $userId = Deserializer::int64($__payload, $__offset);
        $inviterId = Deserializer::int64($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);

        return new self(
            $userId,
            $inviterId,
            $date
        );
    }
}