<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureValueErrorSelfie
 */
final class SecureValueErrorSelfie extends AbstractSecureValueError
{
    public const CONSTRUCTOR_ID = 0xe537ced6;
    
    public string $predicate = 'secureValueErrorSelfie';
    
    /**
     * @param SecureValueType $type
     * @param string $fileHash
     * @param string $text
     */
    public function __construct(
        public readonly SecureValueType $type,
        public readonly string $fileHash,
        public readonly string $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize();
        $buffer .= Serializer::bytes($this->fileHash);
        $buffer .= Serializer::bytes($this->text);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $type = SecureValueType::deserialize($stream);
        $fileHash = Deserializer::bytes($stream);
        $text = Deserializer::bytes($stream);

        return new self(
            $type,
            $fileHash,
            $text
        );
    }
}