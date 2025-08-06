<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.emailVerified
 */
final class EmailVerified extends AbstractEmailVerified
{
    public const CONSTRUCTOR_ID = 0x2b96cd1b;
    
    public string $_ = 'account.emailVerified';
    
    /**
     * @param string $email
     */
    public function __construct(
        public readonly string $email
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->email);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $email = $deserializer->bytes($stream);
        return new self(
            $email
        );
    }
}