<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/securePlainEmail
 */
final class SecurePlainEmail extends AbstractSecurePlainData
{
    public const CONSTRUCTOR_ID = 0x21ec5a5f;
    
    public string $predicate = 'securePlainEmail';
    
    /**
     * @param string $email
     */
    public function __construct(
        public readonly string $email
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->email);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $email = Deserializer::bytes($__payload, $__offset);

        return new self(
            $email
        );
    }
}