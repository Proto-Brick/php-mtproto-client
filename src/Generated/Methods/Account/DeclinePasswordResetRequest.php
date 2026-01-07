<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.declinePasswordReset
 */
final class DeclinePasswordResetRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4c9409f6;
    
    public string $predicate = 'account.declinePasswordReset';
    
    public function getMethodName(): string
    {
        return 'account.declinePasswordReset';
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