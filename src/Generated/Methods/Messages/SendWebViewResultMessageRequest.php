<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputBotInlineResult;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WebViewMessageSent;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.sendWebViewResultMessage
 */
final class SendWebViewResultMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa4314f5;
    
    public string $predicate = 'messages.sendWebViewResultMessage';
    
    public function getMethodName(): string
    {
        return 'messages.sendWebViewResultMessage';
    }
    
    public function getResponseClass(): string
    {
        return WebViewMessageSent::class;
    }
    /**
     * @param string $botQueryId
     * @param AbstractInputBotInlineResult $result
     */
    public function __construct(
        public readonly string $botQueryId,
        public readonly AbstractInputBotInlineResult $result
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->botQueryId);
        $buffer .= $this->result->serialize();
        return $buffer;
    }
}