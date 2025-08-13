<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\BusinessChatLinks;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getBusinessChatLinks
 */
final class GetBusinessChatLinksRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6f70dde1;
    
    public string $predicate = 'account.getBusinessChatLinks';
    
    public function getMethodName(): string
    {
        return 'account.getBusinessChatLinks';
    }
    
    public function getResponseClass(): string
    {
        return BusinessChatLinks::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}