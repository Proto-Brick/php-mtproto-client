<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\Authorizations;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getAuthorizations
 */
final class GetAuthorizationsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe320c158;
    
    public string $predicate = 'account.getAuthorizations';
    
    public function getMethodName(): string
    {
        return 'account.getAuthorizations';
    }
    
    public function getResponseClass(): string
    {
        return Authorizations::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}