<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/securePasswordKdfAlgoSHA512
 */
final class SecurePasswordKdfAlgoSHA512 extends AbstractSecurePasswordKdfAlgo
{
    public const CONSTRUCTOR_ID = 0x86471d92;
    
    public string $predicate = 'securePasswordKdfAlgoSHA512';
    
    /**
     * @param string $salt
     */
    public function __construct(
        public readonly string $salt
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->salt);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $salt = Deserializer::bytes($__payload, $__offset);

        return new self(
            $salt
        );
    }
}