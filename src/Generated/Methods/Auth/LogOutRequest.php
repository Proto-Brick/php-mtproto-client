<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\LoggedOut;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.logOut
 */
final class LogOutRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3e72ba19;
    
    public string $predicate = 'auth.logOut';
    
    public function getMethodName(): string
    {
        return 'auth.logOut';
    }
    
    public function getResponseClass(): string
    {
        return LoggedOut::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}