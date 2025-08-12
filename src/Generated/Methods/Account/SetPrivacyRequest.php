<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\PrivacyRules;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPrivacyRule;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPrivacyKey;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.setPrivacy
 */
final class SetPrivacyRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc9f81ce8;
    
    public string $predicate = 'account.setPrivacy';
    
    public function getMethodName(): string
    {
        return 'account.setPrivacy';
    }
    
    public function getResponseClass(): string
    {
        return PrivacyRules::class;
    }
    /**
     * @param InputPrivacyKey $key
     * @param list<AbstractInputPrivacyRule> $rules
     */
    public function __construct(
        public readonly InputPrivacyKey $key,
        public readonly array $rules
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->key->serialize();
        $buffer .= Serializer::vectorOfObjects($this->rules);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}