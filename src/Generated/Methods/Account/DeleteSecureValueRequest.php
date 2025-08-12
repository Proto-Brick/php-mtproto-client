<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValueType;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.deleteSecureValue
 */
final class DeleteSecureValueRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb880bc4b;
    
    public string $predicate = 'account.deleteSecureValue';
    
    public function getMethodName(): string
    {
        return 'account.deleteSecureValue';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<SecureValueType> $types
     */
    public function __construct(
        public readonly array $types
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->types);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}