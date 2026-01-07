<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Help\TermsOfService;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.authorizationSignUpRequired
 */
final class AuthorizationSignUpRequired extends AbstractAuthorization
{
    public const CONSTRUCTOR_ID = 0x44747e9a;
    
    public string $predicate = 'auth.authorizationSignUpRequired';
    
    /**
     * @param TermsOfService|null $termsOfService
     */
    public function __construct(
        public readonly ?TermsOfService $termsOfService = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->termsOfService !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->termsOfService->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $termsOfService = (($flags & (1 << 0)) !== 0) ? TermsOfService::deserialize($__payload, $__offset) : null;

        return new self(
            $termsOfService
        );
    }
}