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
    public const CONSTRUCTOR_ID = 3903065049;
    
    public string $_ = 'secureValueErrorData';
    
    /**
     * @param AbstractSecureValueType $type
     * @param string $dataHash
     * @param string $field
     * @param string $text
     */
    public function __construct(
        public readonly AbstractSecureValueType $type,
        public readonly string $dataHash,
        public readonly string $field,
        public readonly string $text
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize($serializer);
        $buffer .= $serializer->bytes($this->dataHash);
        $buffer .= $serializer->bytes($this->field);
        $buffer .= $serializer->bytes($this->text);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $type = AbstractSecureValueType::deserialize($deserializer, $stream);
        $dataHash = $deserializer->bytes($stream);
        $field = $deserializer->bytes($stream);
        $text = $deserializer->bytes($stream);
            return new self(
            $type,
            $dataHash,
            $field,
            $text
        );
    }
}