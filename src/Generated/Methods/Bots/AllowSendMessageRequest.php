<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.allowSendMessage
 */
final class AllowSendMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf132e3ef;
    
    public string $predicate = 'bots.allowSendMessage';
    
    public function getMethodName(): string
    {
        return 'bots.allowSendMessage';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
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