<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.confirmPhone
 */
final class ConfirmPhoneRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1596029123;
    
    public string $_ = 'account.confirmPhone';
    
    public function getMethodName(): string
    {
        return 'account.confirmPhone';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $phoneCodeHash
     * @param string $phoneCode
     */
    public function __construct(
        public readonly string $phoneCodeHash,
        public readonly string $phoneCode
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->phoneCodeHash);
        $buffer .= $serializer->bytes($this->phoneCode);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}