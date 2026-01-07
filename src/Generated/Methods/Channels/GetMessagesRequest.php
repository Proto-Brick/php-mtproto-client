<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.getMessages
 */
final class GetMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xad8c9a23;
    
    public string $predicate = 'channels.getMessages';
    
    public function getMethodName(): string
    {
        return 'channels.getMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param list<AbstractInputMessage> $id
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::vectorOfObjects($this->id);
        return $buffer;
    }
}