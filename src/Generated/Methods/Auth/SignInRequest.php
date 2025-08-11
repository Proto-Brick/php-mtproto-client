<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Auth\AbstractAuthorization;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmailVerification;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.signIn
 */
final class SignInRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8d52a951;
    
    public string $_ = 'auth.signIn';
    
    public function getMethodName(): string
    {
        return 'auth.signIn';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorization::class;
    }
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string|null $phoneCode
     * @param AbstractEmailVerification|null $emailVerification
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash,
        public readonly ?string $phoneCode = null,
        public readonly ?AbstractEmailVerification $emailVerification = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->phoneCode !== null) $flags |= (1 << 0);
        if ($this->emailVerification !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->phoneCode);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->emailVerification->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}