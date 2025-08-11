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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int64($this->size);
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::bytes($this->fileHash);
        $buffer .= Serializer::bytes($this->secret);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        $size = Deserializer::int64($stream);
        $dcId = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $fileHash = Deserializer::bytes($stream);
        $secret = Deserializer::bytes($stream);
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