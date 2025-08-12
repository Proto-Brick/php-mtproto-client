<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureValueErrorData
 */
final class SecureValueErrorData extends AbstractSecureValueError
{
    public const CONSTRUCTOR_ID = 0xe8a40bd9;
    
    public string $predicate = 'secureValueErrorData';
    
    /**
     * @param SecureValueType $type
     * @param string $dataHash
     * @param string $field
     * @param string $text
     */
    public function __construct(
        public readonly SecureValueType $type,
        public readonly string $dataHash,
        public readonly string $field,
        public readonly string $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize();
        $buffer .= Serializer::bytes($this->dataHash);
        $buffer .= Serializer::bytes($this->field);
        $buffer .= Serializer::bytes($this->text);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $type = SecureValueType::deserialize($stream);
        $dataHash = Deserializer::bytes($stream);
        $field = Deserializer::bytes($stream);
        $text = Deserializer::bytes($stream);

        return new self(
            $type,
            $dataHash,
            $field,
            $text
        );
    }
}