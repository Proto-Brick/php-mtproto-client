<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatePrivacy
 */
final class UpdatePrivacy extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xee3b272a;
    
    public string $predicate = 'updatePrivacy';
    
    /**
     * @param PrivacyKey $key
     * @param list<AbstractPrivacyRule> $rules
     */
    public function __construct(
        public readonly PrivacyKey $key,
        public readonly array $rules
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->key->serialize();
        $buffer .= Serializer::vectorOfObjects($this->rules);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $key = PrivacyKey::deserialize($__payload, $__offset);
        $rules = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractPrivacyRule::class, 'deserialize']);

        return new self(
            $key,
            $rules
        );
    }
}