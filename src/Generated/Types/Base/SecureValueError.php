<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureValueError
 */
final class SecureValueError extends AbstractSecureValueError
{
    public const CONSTRUCTOR_ID = 0x869d758f;
    
    public string $_ = 'secureValueError';
    
    /**
     * @param AbstractSecureValueType $type
     * @param string $hash
     * @param string $text
     */
    public function __construct(
        public readonly AbstractSecureValueType $type,
        public readonly string $hash,
        public readonly string $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->type->serialize();
        $buffer .= Serializer::bytes($this->hash);
        $buffer .= Serializer::bytes($this->text);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $type = AbstractSecureValueType::deserialize($stream);
        $hash = Deserializer::bytes($stream);
        $text = Deserializer::bytes($stream);
        return new self(
            $type,
            $hash,
            $text
        );
    }
}