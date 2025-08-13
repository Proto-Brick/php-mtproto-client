<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AccountDaysTTL;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getAccountTTL
 */
final class GetAccountTTLRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8fc711d;
    
    public string $predicate = 'account.getAccountTTL';
    
    public function getMethodName(): string
    {
        return 'account.getAccountTTL';
    }
    
    public function getResponseClass(): string
    {
        return AccountDaysTTL::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}