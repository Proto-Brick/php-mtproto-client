<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.verifyPhone
 */
final class VerifyPhoneRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4dd3a7f6;
    
    public string $_ = 'account.verifyPhone';
    
    public function getMethodName(): string
    {
        return 'account.verifyPhone';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $phoneCode
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash,
        public readonly string $phoneCode
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->phoneNumber);
        $buffer .= $serializer->bytes($this->phoneCodeHash);
        $buffer .= $serializer->bytes($this->phoneCode);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}