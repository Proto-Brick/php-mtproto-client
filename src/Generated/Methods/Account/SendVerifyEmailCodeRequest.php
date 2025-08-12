<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\SentEmailCode;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmailVerifyPurpose;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.sendVerifyEmailCode
 */
final class SendVerifyEmailCodeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x98e037bb;
    
    public string $predicate = 'account.sendVerifyEmailCode';
    
    public function getMethodName(): string
    {
        return 'account.sendVerifyEmailCode';
    }
    
    public function getResponseClass(): string
    {
        return SentEmailCode::class;
    }
    /**
     * @param AbstractEmailVerifyPurpose $purpose
     * @param string $email
     */
    public function __construct(
        public readonly AbstractEmailVerifyPurpose $purpose,
        public readonly string $email
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->purpose->serialize();
        $buffer .= Serializer::bytes($this->email);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}