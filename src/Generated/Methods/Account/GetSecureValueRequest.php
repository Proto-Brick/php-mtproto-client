<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSecureValue;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSecureValueType;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getSecureValue
 */
final class GetSecureValueRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1936088002;
    
    public string $_ = 'account.getSecureValue';
    
    public function getMethodName(): string
    {
        return 'account.getSecureValue';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSecureValue::class;
    }
    /**
     * @param list<AbstractSecureValueType> $types
     */
    public function __construct(
        public readonly array $types
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->types);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}