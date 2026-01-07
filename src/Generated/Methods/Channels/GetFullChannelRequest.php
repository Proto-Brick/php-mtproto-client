<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ChatFull;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.getFullChannel
 */
final class GetFullChannelRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8736a09;
    
    public string $predicate = 'channels.getFullChannel';
    
    public function getMethodName(): string
    {
        return 'channels.getFullChannel';
    }
    
    public function getResponseClass(): string
    {
        return ChatFull::class;
    }
    /**
     * @param AbstractInputChannel $channel
     */
    public function __construct(
        public readonly AbstractInputChannel $channel
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        return $buffer;
    }
}