<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.resetWebAuthorization
 */
final class ResetWebAuthorizationRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2d01b9ef;
    
    public string $predicate = 'account.resetWebAuthorization';
    
    public function getMethodName(): string
    {
        return 'account.resetWebAuthorization';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}