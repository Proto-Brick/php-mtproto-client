<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\ChatAdminRights;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.setBotGroupDefaultAdminRights
 */
final class SetBotGroupDefaultAdminRightsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x925ec9ea;
    
    public string $predicate = 'bots.setBotGroupDefaultAdminRights';
    
    public function getMethodName(): string
    {
        return 'bots.setBotGroupDefaultAdminRights';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param ChatAdminRights $adminRights
     */
    public function __construct(
        public readonly ChatAdminRights $adminRights
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->adminRights->serialize();
        return $buffer;
    }
}