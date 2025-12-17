<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.loginToken
 */
final class LoginToken extends AbstractLoginToken
{
    public const CONSTRUCTOR_ID = 0x629f1980;
    
    public string $predicate = 'auth.loginToken';
    
    /**
     * @param int $expires
     * @param string $token
     */
    public function __construct(
        public readonly int $expires,
        public readonly string $token
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->expires);
        $buffer .= Serializer::bytes($this->token);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $expires = Deserializer::int32($__payload, $__offset);
        $token = Deserializer::bytes($__payload, $__offset);

        return new self(
            $expires,
            $token
        );
    }
}