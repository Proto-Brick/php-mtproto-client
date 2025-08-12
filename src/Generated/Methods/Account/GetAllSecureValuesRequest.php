<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValue;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getAllSecureValues
 */
final class GetAllSecureValuesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb288bc7d;
    
    public string $predicate = 'account.getAllSecureValues';
    
    public function getMethodName(): string
    {
        return 'account.getAllSecureValues';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . SecureValue::class . '>';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}