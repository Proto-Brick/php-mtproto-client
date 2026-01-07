<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.deleteChannel
 */
final class DeleteChannelRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc0111fe3;
    
    public string $predicate = 'channels.deleteChannel';
    
    public function getMethodName(): string
    {
        return 'channels.deleteChannel';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
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