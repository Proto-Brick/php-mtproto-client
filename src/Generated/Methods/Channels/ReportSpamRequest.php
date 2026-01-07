<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.reportSpam
 */
final class ReportSpamRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf44a8315;
    
    public string $predicate = 'channels.reportSpam';
    
    public function getMethodName(): string
    {
        return 'channels.reportSpam';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputPeer $participant
     * @param list<int> $id
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputPeer $participant,
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->participant->serialize();
        $buffer .= Serializer::vectorOfInts($this->id);
        return $buffer;
    }
}