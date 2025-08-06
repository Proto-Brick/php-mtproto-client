<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePrivacy
 */
final class UpdatePrivacy extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xee3b272a;
    
    public string $_ = 'updatePrivacy';
    
    /**
     * @param AbstractPrivacyKey $key
     * @param list<AbstractPrivacyRule> $rules
     */
    public function __construct(
        public readonly AbstractPrivacyKey $key,
        public readonly array $rules
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->key->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->rules);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $key = AbstractPrivacyKey::deserialize($deserializer, $stream);
        $rules = $deserializer->vectorOfObjects($stream, [AbstractPrivacyRule::class, 'deserialize']);
        return new self(
            $key,
            $rules
        );
    }
}