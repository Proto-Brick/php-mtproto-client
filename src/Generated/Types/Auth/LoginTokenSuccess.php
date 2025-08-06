<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.loginTokenSuccess
 */
final class LoginTokenSuccess extends AbstractLoginToken
{
    public const CONSTRUCTOR_ID = 0x390d5c5e;
    
    public string $_ = 'auth.loginTokenSuccess';
    
    /**
     * @param AbstractAuthorization $authorization
     */
    public function __construct(
        public readonly AbstractAuthorization $authorization
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->authorization->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $authorization = AbstractAuthorization::deserialize($deserializer, $stream);
        return new self(
            $authorization
        );
    }
}