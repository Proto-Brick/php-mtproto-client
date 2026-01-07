<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.resetAuthorizations
 */
final class ResetAuthorizationsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9fab0d1a;
    
    public string $predicate = 'auth.resetAuthorizations';
    
    public function getMethodName(): string
    {
        return 'auth.resetAuthorizations';
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