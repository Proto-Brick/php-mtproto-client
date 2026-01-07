<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/emailVerificationGoogle
 */
final class EmailVerificationGoogle extends AbstractEmailVerification
{
    public const CONSTRUCTOR_ID = 0xdb909ec2;
    
    public string $predicate = 'emailVerificationGoogle';
    
    /**
     * @param string $token
     */
    public function __construct(
        public readonly string $token
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->token);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $token = Deserializer::bytes($__payload, $__offset);

        return new self(
            $token
        );
    }
}