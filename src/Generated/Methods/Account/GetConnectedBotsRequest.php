<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\ConnectedBots;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getConnectedBots
 */
final class GetConnectedBotsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4ea4c80f;
    
    public string $predicate = 'account.getConnectedBots';
    
    public function getMethodName(): string
    {
        return 'account.getConnectedBots';
    }
    
    public function getResponseClass(): string
    {
        return ConnectedBots::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}