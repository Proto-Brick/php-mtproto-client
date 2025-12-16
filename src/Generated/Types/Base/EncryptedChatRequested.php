<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/encryptedChatRequested
 */
final class EncryptedChatRequested extends AbstractEncryptedChat
{
    public const CONSTRUCTOR_ID = 0x48f1d94c;
    
    public string $predicate = 'encryptedChatRequested';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $date
     * @param int $adminId
     * @param int $participantId
     * @param string $gA
     * @param int|null $folderId
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $date,
        public readonly int $adminId,
        public readonly int $participantId,
        public readonly string $gA,
        public readonly ?int $folderId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->folderId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->folderId);
        }
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int64($this->adminId);
        $buffer .= Serializer::int64($this->participantId);
        $buffer .= Serializer::bytes($this->gA);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $folderId = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $id = Deserializer::int32($stream);
        $accessHash = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $adminId = Deserializer::int64($stream);
        $participantId = Deserializer::int64($stream);
        $gA = Deserializer::bytes($stream);

        return new self(
            $id,
            $accessHash,
            $date,
            $adminId,
            $participantId,
            $gA,
            $folderId
        );
    }
}