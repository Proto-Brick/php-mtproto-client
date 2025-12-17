<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/encryptedChatWaiting
 */
final class EncryptedChatWaiting extends AbstractEncryptedChat
{
    public const CONSTRUCTOR_ID = 0x66b25953;
    
    public string $predicate = 'encryptedChatWaiting';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $date
     * @param int $adminId
     * @param int $participantId
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $date,
        public readonly int $adminId,
        public readonly int $participantId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->adminId);
        $buffer .= Serializer::int64($this->participantId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $id = Deserializer::int32($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $adminId = Deserializer::int64($__payload, $__offset);
        $participantId = Deserializer::int64($__payload, $__offset);

        return new self(
            $id,
            $accessHash,
            $date,
            $adminId,
            $participantId
        );
    }
}