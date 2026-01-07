<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\Passkeys;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getPasskeys
 */
final class GetPasskeysRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xea1f0c52;
    
    public string $predicate = 'account.getPasskeys';
    
    public function getMethodName(): string
    {
        return 'account.getPasskeys';
    }
    
    public function getResponseClass(): string
    {
        return Passkeys::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}