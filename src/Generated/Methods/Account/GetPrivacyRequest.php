<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\PrivacyRules;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyKey;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getPrivacy
 */
final class GetPrivacyRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdadbc950;
    
    public string $predicate = 'account.getPrivacy';
    
    public function getMethodName(): string
    {
        return 'account.getPrivacy';
    }
    
    public function getResponseClass(): string
    {
        return PrivacyRules::class;
    }
    /**
     * @param InputPrivacyKey $key
     */
    public function __construct(
        public readonly InputPrivacyKey $key
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->key->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}