<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.resetWebAuthorizations
 */
final class ResetWebAuthorizationsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x682d2594;
    
    public string $predicate = 'account.resetWebAuthorizations';
    
    public function getMethodName(): string
    {
        return 'account.resetWebAuthorizations';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}