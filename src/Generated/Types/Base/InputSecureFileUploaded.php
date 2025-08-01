<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputSecureFileUploaded
 */
final class InputSecureFileUploaded extends AbstractInputSecureFile
{
    public const CONSTRUCTOR_ID = 859091184;
    
    public string $_ = 'inputSecureFileUploaded';
    
    /**
     * @param int $id
     * @param int $parts
     * @param string $md5Checksum
     * @param string $fileHash
     * @param string $secret
     */
    public function __construct(
        public readonly int $id,
        public readonly int $parts,
        public readonly string $md5Checksum,
        public readonly string $fileHash,
        public readonly string $secret
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int32($this->parts);
        $buffer .= $serializer->bytes($this->md5Checksum);
        $buffer .= $serializer->bytes($this->fileHash);
        $buffer .= $serializer->bytes($this->secret);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int64($stream);
        $parts = $deserializer->int32($stream);
        $md5Checksum = $deserializer->bytes($stream);
        $fileHash = $deserializer->bytes($stream);
        $secret = $deserializer->bytes($stream);
            return new self(
            $id,
            $parts,
            $md5Checksum,
            $fileHash,
            $secret
        );
    }
}