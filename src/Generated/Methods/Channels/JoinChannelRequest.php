<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.joinChannel
 */
final class JoinChannelRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x24b524c5;
    
    public string $predicate = 'channels.joinChannel';
    
    public function getMethodName(): string
    {
        return 'channels.joinChannel';
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