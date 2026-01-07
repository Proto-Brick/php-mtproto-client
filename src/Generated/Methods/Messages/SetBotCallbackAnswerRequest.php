<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.setBotCallbackAnswer
 */
final class SetBotCallbackAnswerRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd58f130a;
    
    public string $predicate = 'messages.setBotCallbackAnswer';
    
    public function getMethodName(): string
    {
        return 'messages.setBotCallbackAnswer';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $queryId
     * @param int $cacheTime
     * @param true|null $alert
     * @param string|null $message
     * @param string|null $url
     */
    public function __construct(
        public readonly int $queryId,
        public readonly int $cacheTime,
        public readonly ?true $alert = null,
        public readonly ?string $message = null,
        public readonly ?string $url = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->alert) {
            $flags |= (1 << 1);
        }
        if ($this->message !== null) {
            $flags |= (1 << 0);
        }
        if ($this->url !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->queryId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->message);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->url);
        }
        $buffer .= Serializer::int32($this->cacheTime);
        return $buffer;
    }
}