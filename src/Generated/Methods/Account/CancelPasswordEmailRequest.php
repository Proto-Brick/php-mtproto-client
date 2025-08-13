<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.cancelPasswordEmail
 */
final class CancelPasswordEmailRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc1cbd5b6;
    
    public string $predicate = 'account.cancelPasswordEmail';
    
    public function getMethodName(): string
    {
        return 'account.cancelPasswordEmail';
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