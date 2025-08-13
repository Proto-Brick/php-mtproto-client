<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.setAuthorizationTTL
 */
final class SetAuthorizationTTLRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xbf899aa0;
    
    public string $predicate = 'account.setAuthorizationTTL';
    
    public function getMethodName(): string
    {
        return 'account.setAuthorizationTTL';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $authorizationTtlDays
     */
    public function __construct(
        public readonly int $authorizationTtlDays
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->authorizationTtlDays);
        return $buffer;
    }
}