<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageEntityMentionName
 */
final class MessageEntityMentionName extends AbstractMessageEntity
{
    public const CONSTRUCTOR_ID = 0xdc7b1140;
    
    public string $predicate = 'messageEntityMentionName';
    
    /**
     * @param int $offset
     * @param int $length
     * @param int $userId
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $length,
        public readonly int $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->length);
        $buffer .= Serializer::int64($this->userId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $offset = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $length = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $userId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $offset,
            $length,
            $userId
        );
    }
}