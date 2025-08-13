<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/encryptedChat
 */
final class EncryptedChat extends AbstractEncryptedChat
{
    public const CONSTRUCTOR_ID = 0x61f0d4c7;
    
    public string $predicate = 'encryptedChat';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $date
     * @param int $adminId
     * @param int $participantId
     * @param string $gAOrB
     * @param int $keyFingerprint
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $date,
        public readonly int $adminId,
        public readonly int $participantId,
        public readonly string $gAOrB,
        public readonly int $keyFingerprint
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->adminId);
        $buffer .= Serializer::int64($this->participantId);
        $buffer .= Serializer::bytes($this->gAOrB);
        $buffer .= Serializer::int64($this->keyFingerprint);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = Deserializer::int32($stream);
        $accessHash = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $adminId = Deserializer::int64($stream);
        $participantId = Deserializer::int64($stream);
        $gAOrB = Deserializer::bytes($stream);
        $keyFingerprint = Deserializer::int64($stream);

        return new self(
            $id,
            $accessHash,
            $date,
            $adminId,
            $participantId,
            $gAOrB,
            $keyFingerprint
        );
    }
}