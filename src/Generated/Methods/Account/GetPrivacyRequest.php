<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\PrivacyRules;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPrivacyKey;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getPrivacy
 */
final class GetPrivacyRequest extends RpcRequest
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
}