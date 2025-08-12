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
    
    public string $predicate = 'account.emailVerifiedLogin';
    
    /**
     * @param string $email
     * @param AbstractSentCode $sentCode
     */
    public function __construct(
        public readonly string $email,
        public readonly AbstractSentCode $sentCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->email);
        $buffer .= $this->sentCode->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $email = Deserializer::bytes($stream);
        $sentCode = AbstractSentCode::deserialize($stream);

        return new self(
            $email,
            $sentCode
        );
    }
}