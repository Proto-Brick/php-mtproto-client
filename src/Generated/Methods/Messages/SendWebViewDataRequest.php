<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.sendWebViewData
 */
final class SendWebViewDataRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xdc0242c8;
    
    public string $predicate = 'messages.sendWebViewData';
    
    public function getMethodName(): string
    {
        return 'messages.sendWebViewData';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param int $randomId
     * @param string $buttonText
     * @param string $data
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly int $randomId,
        public readonly string $buttonText,
        public readonly string $data
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= Serializer::bytes($this->buttonText);
        $buffer .= Serializer::bytes($this->data);
        return $buffer;
    }
}