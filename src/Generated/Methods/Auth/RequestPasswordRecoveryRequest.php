<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\PasswordRecovery;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.requestPasswordRecovery
 */
final class RequestPasswordRecoveryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd897bc66;
    
    public string $predicate = 'auth.requestPasswordRecovery';
    
    public function getMethodName(): string
    {
        return 'auth.requestPasswordRecovery';
    }
    
    public function getResponseClass(): string
    {
        return PasswordRecovery::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}