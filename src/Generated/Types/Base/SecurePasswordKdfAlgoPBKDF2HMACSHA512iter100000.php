<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/securePasswordKdfAlgoPBKDF2HMACSHA512iter100000
 */
final class SecurePasswordKdfAlgoPBKDF2HMACSHA512iter100000 extends AbstractSecurePasswordKdfAlgo
{
    public const CONSTRUCTOR_ID = 0xbbf2dda0;
    
    public string $predicate = 'securePasswordKdfAlgoPBKDF2HMACSHA512iter100000';
    
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