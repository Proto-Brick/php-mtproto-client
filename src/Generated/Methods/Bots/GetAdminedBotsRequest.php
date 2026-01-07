<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.getAdminedBots
 */
final class GetAdminedBotsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb0711d83;
    
    public string $predicate = 'bots.getAdminedBots';
    
    public function getMethodName(): string
    {
        return 'bots.getAdminedBots';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractUser::class . '>';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}