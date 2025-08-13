<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractResetPasswordResult;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.resetPassword
 */
final class ResetPasswordRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9308ce1b;
    
    public string $predicate = 'account.resetPassword';
    
    public function getMethodName(): string
    {
        return 'account.resetPassword';
    }
    
    public function getResponseClass(): string
    {
        return AbstractResetPasswordResult::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}