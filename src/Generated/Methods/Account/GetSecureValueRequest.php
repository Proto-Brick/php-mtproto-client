<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValue;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueType;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getSecureValue
 */
final class GetSecureValueRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x73665bc2;
    
    public string $predicate = 'account.getSecureValue';
    
    public function getMethodName(): string
    {
        return 'account.getSecureValue';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . SecureValue::class . '>';
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