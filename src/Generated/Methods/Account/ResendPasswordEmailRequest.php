<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.resendPasswordEmail
 */
final class ResendPasswordEmailRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7a7f2a15;
    
    public string $predicate = 'account.resendPasswordEmail';
    
    public function getMethodName(): string
    {
        return 'account.resendPasswordEmail';
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