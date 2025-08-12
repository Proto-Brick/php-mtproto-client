<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputEncryptedFileUploaded
 */
final class InputEncryptedFileUploaded extends AbstractInputEncryptedFile
{
    public const CONSTRUCTOR_ID = 0x64bd0306;
    
    public string $predicate = 'inputEncryptedFileUploaded';
    
    /**
     * @param int $id
     * @param int $parts
     * @param string $md5Checksum
     * @param int $keyFingerprint
     */
    public function __construct(
        public readonly int $id,
        public readonly int $parts,
        public readonly string $md5Checksum,
        public readonly int $keyFingerprint
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int32($this->parts);
        $buffer .= Serializer::bytes($this->md5Checksum);
        $buffer .= Serializer::int32($this->keyFingerprint);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = Deserializer::int64($stream);
        $parts = Deserializer::int32($stream);
        $md5Checksum = Deserializer::bytes($stream);
        $keyFingerprint = Deserializer::int32($stream);

        return new self(
            $id,
            $parts,
            $md5Checksum,
            $keyFingerprint
        );
    }
}