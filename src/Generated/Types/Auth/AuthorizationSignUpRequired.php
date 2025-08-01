<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractTermsOfService;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.authorizationSignUpRequired
 */
final class AuthorizationSignUpRequired extends AbstractAuthorization
{
    public const CONSTRUCTOR_ID = 1148485274;
    
    public string $_ = 'auth.authorizationSignUpRequired';
    
    /**
     * @param AbstractTermsOfService|null $termsOfService
     */
    public function __construct(
        public readonly ?AbstractTermsOfService $termsOfService = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->termsOfService !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->termsOfService->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $termsOfService = ($flags & (1 << 0)) ? AbstractTermsOfService::deserialize($deserializer, $stream) : null;
            return new self(
            $termsOfService
        );
    }
}