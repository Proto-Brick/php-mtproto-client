<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/emailVerificationCode
 */
final class EmailVerificationCode extends AbstractEmailVerification
{
    public const CONSTRUCTOR_ID = 0x922e55a9;
    
    public string $predicate = 'emailVerificationCode';
    
    /**
     * @param string $code
     */
    public function __construct(
        public readonly string $code
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->code);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $code = Deserializer::bytes($__payload, $__offset);

        return new self(
            $code
        );
    }
}