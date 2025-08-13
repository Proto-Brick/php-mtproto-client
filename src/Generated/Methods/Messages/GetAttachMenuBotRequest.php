<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AttachMenuBotsBot;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getAttachMenuBot
 */
final class GetAttachMenuBotRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x77216192;
    
    public string $predicate = 'messages.getAttachMenuBot';
    
    public function getMethodName(): string
    {
        return 'messages.getAttachMenuBot';
    }
    
    public function getResponseClass(): string
    {
        return AttachMenuBotsBot::class;
    }
    /**
     * @param AbstractInputUser $bot
     */
    public function __construct(
        public readonly AbstractInputUser $bot
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        return $buffer;
    }
}