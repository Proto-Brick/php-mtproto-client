<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.readHistory
 */
final class ReadHistoryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xcc104937;
    
    public string $predicate = 'channels.readHistory';
    
    public function getMethodName(): string
    {
        return 'channels.readHistory';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $maxId
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $maxId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->maxId);
        return $buffer;
    }
}