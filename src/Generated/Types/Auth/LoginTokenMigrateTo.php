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
    
    public string $predicate = 'auth.loginTokenMigrateTo';
    
    /**
     * @param int $dcId
     * @param string $token
     */
    public function __construct(
        public readonly int $dcId,
        public readonly string $token
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::bytes($this->token);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $dcId = Deserializer::int32($stream);
        $token = Deserializer::bytes($stream);

        return new self(
            $dcId,
            $token
        );
    }
}