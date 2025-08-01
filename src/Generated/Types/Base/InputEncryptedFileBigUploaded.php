<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputEncryptedFileBigUploaded
 */
final class InputEncryptedFileBigUploaded extends AbstractInputEncryptedFile
{
    public const CONSTRUCTOR_ID = 767652808;
    
    public string $_ = 'inputEncryptedFileBigUploaded';
    
    /**
     * @param int $id
     * @param int $parts
     * @param int $keyFingerprint
     */
    public function __construct(
        public readonly int $id,
        public readonly int $parts,
        public readonly int $keyFingerprint
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int32($this->parts);
        $buffer .= $serializer->int32($this->keyFingerprint);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->int64($stream);
        $parts = $deserializer->int32($stream);
        $keyFingerprint = $deserializer->int32($stream);
            return new self(
            $id,
            $parts,
            $keyFingerprint
        );
    }
}