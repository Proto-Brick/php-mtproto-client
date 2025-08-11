<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Help\TermsOfService;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.authorizationSignUpRequired
 */
final class AuthorizationSignUpRequired extends AbstractAuthorization
{
    public const CONSTRUCTOR_ID = 0x44747e9a;
    
    public string $_ = 'auth.authorizationSignUpRequired';
    
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
        if ($this->termsOfService !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->termsOfService->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $termsOfService = ($flags & (1 << 0)) ? TermsOfService::deserialize($stream) : null;
        return new self(
            $termsOfService
        );
    }
}