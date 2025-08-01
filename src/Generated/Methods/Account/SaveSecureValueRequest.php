<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputSecureValue;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSecureValue;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.saveSecureValue
 */
final class SaveSecureValueRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2308956957;
    
    public string $_ = 'account.saveSecureValue';
    
    public function getMethodName(): string
    {
        return 'account.saveSecureValue';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSecureValue::class;
    }
    /**
     * @param AbstractInputSecureValue $value
     * @param int $secureSecretId
     */
    public function __construct(
        public readonly AbstractInputSecureValue $value,
        public readonly int $secureSecretId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->value->serialize($serializer);
        $buffer .= $serializer->int64($this->secureSecretId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}