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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->int64($this->accessHash);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int64($this->adminId);
        $buffer .= $serializer->int64($this->participantId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int32($stream);
        $accessHash = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $adminId = $deserializer->int64($stream);
        $participantId = $deserializer->int64($stream);
        return new self(
            $id,
            $accessHash,
            $date,
            $adminId,
            $participantId
        );
    }
}