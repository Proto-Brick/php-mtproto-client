<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.loginToken
 */
final class LoginToken extends AbstractLoginToken
{
    public const CONSTRUCTOR_ID = 1654593920;
    
    public string $_ = 'auth.loginToken';
    
    /**
     * @param int $expires
     * @param string $token
     */
    public function __construct(
        public readonly int $expires,
        public readonly string $token
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->expires);
        $buffer .= $serializer->bytes($this->token);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $expires = $deserializer->int32($stream);
        $token = $deserializer->bytes($stream);
            return new self(
            $expires,
            $token
        );
    }
}