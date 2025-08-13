<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractChats;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.getChannelRecommendations
 */
final class GetChannelRecommendationsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x25a71742;
    
    public string $predicate = 'channels.getChannelRecommendations';
    
    public function getMethodName(): string
    {
        return 'channels.getChannelRecommendations';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChats::class;
    }
    /**
     * @param AbstractInputChannel|null $channel
     */
    public function __construct(
        public readonly ?AbstractInputChannel $channel = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->channel !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->channel->serialize();
        }
        return $buffer;
    }
}