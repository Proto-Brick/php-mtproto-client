<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Channels\ChannelParticipant;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.getParticipant
 */
final class GetParticipantRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa0ab6cc6;
    
    public string $predicate = 'channels.getParticipant';
    
    public function getMethodName(): string
    {
        return 'channels.getParticipant';
    }
    
    public function getResponseClass(): string
    {
        return ChannelParticipant::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputPeer $participant
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputPeer $participant
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->participant->serialize();
        return $buffer;
    }
}