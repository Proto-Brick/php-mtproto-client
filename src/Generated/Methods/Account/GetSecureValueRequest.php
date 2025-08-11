<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSecureValueType;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValue;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getSecureValue
 */
final class GetSecureValueRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x73665bc2;
    
    public string $_ = 'account.getSecureValue';
    
    public function getMethodName(): string
    {
        return 'account.getSecureValue';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . SecureValue::class . '>';
    }
    /**
     * @param list<AbstractSecureValueType> $types
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