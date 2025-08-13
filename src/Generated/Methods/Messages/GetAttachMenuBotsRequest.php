<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractAttachMenuBots;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getAttachMenuBots
 */
final class GetAttachMenuBotsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x16fcc2cb;
    
    public string $predicate = 'messages.getAttachMenuBots';
    
    public function getMethodName(): string
    {
        return 'messages.getAttachMenuBots';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAttachMenuBots::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}