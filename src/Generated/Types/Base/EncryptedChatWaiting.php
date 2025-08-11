<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/encryptedChatWaiting
 */
final class EncryptedChatWaiting extends AbstractEncryptedChat
{
    public const CONSTRUCTOR_ID = 0x66b25953;
    
    public string $_ = 'encryptedChatWaiting';
    
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $id = Deserializer::int32($stream);
        $accessHash = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $adminId = Deserializer::int64($stream);
        $participantId = Deserializer::int64($stream);
        return new self(
            $id,
            $accessHash,
            $date,
            $adminId,
            $participantId
        );
    }
}