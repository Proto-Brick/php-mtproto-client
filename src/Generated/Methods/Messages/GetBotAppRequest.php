<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputBotApp;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\BotApp;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getBotApp
 */
final class GetBotAppRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x34fdc5c3;
    
    public string $predicate = 'messages.getBotApp';
    
    public function getMethodName(): string
    {
        return 'messages.getBotApp';
    }
    
    public function getResponseClass(): string
    {
        return BotApp::class;
    }
    /**
     * @param AbstractInputBotApp $app
     * @param int $hash
     */
    public function __construct(
        public readonly AbstractInputBotApp $app,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->app->serialize();
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}