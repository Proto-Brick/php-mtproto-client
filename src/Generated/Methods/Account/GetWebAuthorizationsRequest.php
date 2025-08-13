<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\WebAuthorizations;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getWebAuthorizations
 */
final class GetWebAuthorizationsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x182e6d6f;
    
    public string $predicate = 'account.getWebAuthorizations';
    
    public function getMethodName(): string
    {
        return 'account.getWebAuthorizations';
    }
    
    public function getResponseClass(): string
    {
        return WebAuthorizations::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}