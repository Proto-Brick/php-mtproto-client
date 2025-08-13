<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/secureValueErrorFrontSide
 */
final class SecureValueErrorFrontSide extends AbstractSecureValueError
{
    public const CONSTRUCTOR_ID = 0xbe3dfa;
    
    public string $predicate = 'secureValueErrorFrontSide';
    
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