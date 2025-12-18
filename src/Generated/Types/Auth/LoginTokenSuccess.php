<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.loginTokenSuccess
 */
final class LoginTokenSuccess extends AbstractLoginToken
{
    public const CONSTRUCTOR_ID = 0x390d5c5e;
    
    public string $predicate = 'auth.loginTokenSuccess';
    
    /**
     * @param AbstractAuthorization $authorization
     */
    public function __construct(
        public readonly AbstractAuthorization $authorization
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->authorization->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $authorization = AbstractAuthorization::deserialize($__payload, $__offset);

        return new self(
            $authorization
        );
    }
}