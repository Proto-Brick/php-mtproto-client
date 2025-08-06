<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractSentCode;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.emailVerifiedLogin
 */
final class EmailVerifiedLogin extends AbstractEmailVerified
{
    public const CONSTRUCTOR_ID = 0xe1bb0d61;
    
    public string $_ = 'account.emailVerifiedLogin';
    
    /**
     * @param string $email
     * @param AbstractSentCode $sentCode
     */
    public function __construct(
        public readonly string $email,
        public readonly AbstractSentCode $sentCode
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->email);
        $buffer .= $this->sentCode->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $email = $deserializer->bytes($stream);
        $sentCode = AbstractSentCode::deserialize($deserializer, $stream);
        return new self(
            $email,
            $sentCode
        );
    }
}