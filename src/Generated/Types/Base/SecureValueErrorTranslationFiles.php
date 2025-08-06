<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureValueErrorTranslationFiles
 */
final class SecureValueErrorTranslationFiles extends AbstractSecureValueError
{
    public const CONSTRUCTOR_ID = 0x34636dd8;
    
    public string $_ = 'secureValueErrorTranslationFiles';
    
    /**
     * @param AbstractSecureValueType $type
     * @param list<string> $fileHash
     * @param string $text
     */
    public function __construct(
        public readonly AbstractSecureValueType $type,
        public readonly array $fileHash,
        public readonly string $text
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize($serializer);
        $buffer .= $serializer->vectorOfStrings($this->fileHash);
        $buffer .= $serializer->bytes($this->text);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $type = AbstractSecureValueType::deserialize($deserializer, $stream);
        $fileHash = $deserializer->vectorOfStrings($stream);
        $text = $deserializer->bytes($stream);
        return new self(
            $type,
            $fileHash,
            $text
        );
    }
}