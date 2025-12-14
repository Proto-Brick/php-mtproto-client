<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatParticipantAdmin
 */
final class ChatParticipantAdmin extends AbstractChatParticipant
{
    public const CONSTRUCTOR_ID = 0xa0933f5b;
    
    public string $predicate = 'chatParticipantAdmin';
    
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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $userId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $inviterId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $userId,
            $inviterId,
            $date
        );
    }
}