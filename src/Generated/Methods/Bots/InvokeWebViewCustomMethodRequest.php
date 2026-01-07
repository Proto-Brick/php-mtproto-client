<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.invokeWebViewCustomMethod
 */
final class InvokeWebViewCustomMethodRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x87fc5e7;
    
    public string $predicate = 'bots.invokeWebViewCustomMethod';
    
    public function getMethodName(): string
    {
        return 'bots.invokeWebViewCustomMethod';
    }
    
    public function getResponseClass(): string
    {
        return 'array';
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $customMethod
     * @param array $params
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $customMethod,
        public readonly array $params
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::bytes($this->customMethod);
        $buffer .= Serializer::serializeDataJSON($this->params);
        return $buffer;
    }
}