<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\PrivacyRules;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPrivacyRule;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyKey;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.setPrivacy
 */
final class SetPrivacyRequest extends RpcRequest
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
}