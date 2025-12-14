<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChatParticipantAdd
 */
final class UpdateChatParticipantAdd extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x3dda5451;
    
    public string $predicate = 'updateChatParticipantAdd';
    
    /**
     * @param int $chatId
     * @param int $userId
     * @param int $inviterId
     * @param int $date
     * @param int $version
     */
    public function __construct(
        public readonly int $chatId,
        public readonly int $userId,
        public readonly int $inviterId,
        public readonly int $date,
        public readonly int $version
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int64($this->inviterId);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->version);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $chatId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $userId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $inviterId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $version = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $chatId,
            $userId,
            $inviterId,
            $date,
            $version
        );
    }
}