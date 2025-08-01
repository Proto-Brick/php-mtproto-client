<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/encryptedFile
 */
final class EncryptedFile extends AbstractEncryptedFile
{
    public const CONSTRUCTOR_ID = 2818608344;
    
    public string $_ = 'encryptedFile';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $size
     * @param int $dcId
     * @param int $keyFingerprint
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $size,
        public readonly int $dcId,
        public readonly int $keyFingerprint
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int64($this->accessHash);
        $buffer .= $serializer->int64($this->size);
        $buffer .= $serializer->int32($this->dcId);
        $buffer .= $serializer->int32($this->keyFingerprint);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int64($stream);
        $accessHash = $deserializer->int64($stream);
        $size = $deserializer->int64($stream);
        $dcId = $deserializer->int32($stream);
        $keyFingerprint = $deserializer->int32($stream);
            return new self(
            $id,
            $accessHash,
            $size,
            $dcId,
            $keyFingerprint
        );
    }
}