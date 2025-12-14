<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChatParticipantAdmin
 */
final class UpdateChatParticipantAdmin extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xd7ca61a2;
    
    public string $predicate = 'updateChatParticipantAdmin';
    
    /**
     * @param int $chatId
     * @param int $userId
     * @param bool $isAdmin
     * @param int $version
     */
    public function __construct(
        public readonly int $chatId,
        public readonly int $userId,
        public readonly bool $isAdmin,
        public readonly int $version
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= ($this->isAdmin ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
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
        $isAdmin = (unpack('V', substr($stream, 0, 4))[1] === 0x997275b5);
        $stream = substr($stream, 4);
        $version = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $chatId,
            $userId,
            $isAdmin,
            $version
        );
    }
}