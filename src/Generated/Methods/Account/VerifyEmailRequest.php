<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractEmailVerified;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmailVerification;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmailVerifyPurpose;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.verifyEmail
 */
final class VerifyEmailRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x32da4cf;
    
    public string $predicate = 'account.verifyEmail';
    
    public function getMethodName(): string
    {
        return 'account.verifyEmail';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmailVerified::class;
    }
    /**
     * @param AbstractEmailVerifyPurpose $purpose
     * @param AbstractEmailVerification $verification
     */
    public function __construct(
        public readonly AbstractEmailVerifyPurpose $purpose,
        public readonly AbstractEmailVerification $verification
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->purpose->serialize();
        $buffer .= $this->verification->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}