<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/encryptedChat
 */
final class EncryptedChat extends AbstractEncryptedChat
{
    public const CONSTRUCTOR_ID = 1643173063;
    
    public string $_ = 'encryptedChat';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->int64($this->accessHash);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int64($this->adminId);
        $buffer .= $serializer->int64($this->participantId);
        $buffer .= $serializer->bytes($this->gAOrB);
        $buffer .= $serializer->int64($this->keyFingerprint);
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
        $gAOrB = $deserializer->bytes($stream);
        $keyFingerprint = $deserializer->int64($stream);
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