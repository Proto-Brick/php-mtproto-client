<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputSecureValue;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValue;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.saveSecureValue
 */
final class SaveSecureValueRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x899fe31d;
    
    public string $predicate = 'account.saveSecureValue';
    
    public function getMethodName(): string
    {
        return 'account.saveSecureValue';
    }
    
    public function getResponseClass(): string
    {
        return SecureValue::class;
    }
    /**
     * @param InputSecureValue $value
     * @param int $secureSecretId
     */
    public function __construct(
        public readonly InputSecureValue $value,
        public readonly int $secureSecretId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->value->serialize();
        $buffer .= Serializer::int64($this->secureSecretId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}