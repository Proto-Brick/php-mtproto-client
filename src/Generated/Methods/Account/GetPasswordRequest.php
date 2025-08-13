<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\Password;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getPassword
 */
final class GetPasswordRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x548a30f5;
    
    public string $predicate = 'account.getPassword';
    
    public function getMethodName(): string
    {
        return 'account.getPassword';
    }
    
    public function getResponseClass(): string
    {
        return Password::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}