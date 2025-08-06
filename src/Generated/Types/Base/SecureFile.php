<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureFile
 */
final class SecureFile extends AbstractSecureFile
{
    public const CONSTRUCTOR_ID = 0x7d09c27e;
    
    public string $_ = 'secureFile';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $size
     * @param int $dcId
     * @param int $date
     * @param string $fileHash
     * @param string $secret
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $size,
        public readonly int $dcId,
        public readonly int $date,
        public readonly string $fileHash,
        public readonly string $secret
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int64($this->accessHash);
        $buffer .= $serializer->int64($this->size);
        $buffer .= $serializer->int32($this->dcId);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->bytes($this->fileHash);
        $buffer .= $serializer->bytes($this->secret);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int64($stream);
        $accessHash = $deserializer->int64($stream);
        $size = $deserializer->int64($stream);
        $dcId = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        $fileHash = $deserializer->bytes($stream);
        $secret = $deserializer->bytes($stream);
        return new self(
            $id,
            $accessHash,
            $size,
            $dcId,
            $date,
            $fileHash,
            $secret
        );
    }
}