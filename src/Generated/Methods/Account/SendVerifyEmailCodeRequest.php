<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractSentEmailCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmailVerifyPurpose;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.sendVerifyEmailCode
 */
final class SendVerifyEmailCodeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2564831163;
    
    public string $_ = 'account.sendVerifyEmailCode';
    
    public function getMethodName(): string
    {
        return 'account.sendVerifyEmailCode';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentEmailCode::class;
    }
    /**
     * @param AbstractEmailVerifyPurpose $purpose
     * @param string $email
     */
    public function __construct(
        public readonly AbstractEmailVerifyPurpose $purpose,
        public readonly string $email
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->purpose->serialize($serializer);
        $buffer .= $serializer->bytes($this->email);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}