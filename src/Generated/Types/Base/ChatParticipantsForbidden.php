<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatParticipantsForbidden
 */
final class ChatParticipantsForbidden extends AbstractChatParticipants
{
    public const CONSTRUCTOR_ID = 0x8763d3e1;
    
    public string $predicate = 'chatParticipantsForbidden';
    
    /**
     * @param int $chatId
     * @param AbstractChatParticipant|null $selfParticipant
     */
    public function __construct(
        public readonly int $chatId,
        public readonly ?AbstractChatParticipant $selfParticipant = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->selfParticipant !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->chatId);
        if ($flags & (1 << 0)) {
            $buffer .= $this->selfParticipant->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $chatId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $selfParticipant = (($flags & (1 << 0)) !== 0) ? AbstractChatParticipant::deserialize($stream) : null;

        return new self(
            $chatId,
            $selfParticipant
        );
    }
}