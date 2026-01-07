<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputSecureValue;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValue;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.saveSecureValue
 */
final class SaveSecureValueRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x899fe31d;
    
    public string $predicate = 'account.saveSecureValue';
    
    public function getMethodName(): string
    {
        return 'account.saveSecureValue';
    }
    
    public function getResponseClass(): string
    {
        return SecureValue::class;
    }
    /**
     * @param InputSecureValue $value
     * @param int $secureSecretId
     */
    public function __construct(
        public readonly InputSecureValue $value,
        public readonly int $secureSecretId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->value->serialize();
        $buffer .= Serializer::int64($this->secureSecretId);
        return $buffer;
    }
}