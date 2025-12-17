<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/secureValueErrorFiles
 */
final class SecureValueErrorFiles extends AbstractSecureValueError
{
    public const CONSTRUCTOR_ID = 0x666220e9;
    
    public string $predicate = 'secureValueErrorFiles';
    
    /**
     * @param SecureValueType $type
     * @param list<string> $fileHash
     * @param string $text
     */
    public function __construct(
        public readonly SecureValueType $type,
        public readonly array $fileHash,
        public readonly string $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize();
        $buffer .= Serializer::vectorOfStrings($this->fileHash);
        $buffer .= Serializer::bytes($this->text);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $type = SecureValueType::deserialize($__payload, $__offset);
        $fileHash = Deserializer::vectorOfStrings($__payload, $__offset);
        $text = Deserializer::bytes($__payload, $__offset);

        return new self(
            $type,
            $fileHash,
            $text
        );
    }
}