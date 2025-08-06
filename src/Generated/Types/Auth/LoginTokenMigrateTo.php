<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.loginTokenMigrateTo
 */
final class LoginTokenMigrateTo extends AbstractLoginToken
{
    public const CONSTRUCTOR_ID = 0x68e9916;
    
    public string $_ = 'auth.loginTokenMigrateTo';
    
    /**
     * @param int $dcId
     * @param string $token
     */
    public function __construct(
        public readonly int $dcId,
        public readonly string $token
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->dcId);
        $buffer .= $serializer->bytes($this->token);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $dcId = $deserializer->int32($stream);
        $token = $deserializer->bytes($stream);
        return new self(
            $dcId,
            $token
        );
    }
}