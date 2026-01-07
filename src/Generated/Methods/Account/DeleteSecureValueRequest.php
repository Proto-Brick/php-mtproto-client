<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueType;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.deleteSecureValue
 */
final class DeleteSecureValueRequest extends RpcRequest
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
}