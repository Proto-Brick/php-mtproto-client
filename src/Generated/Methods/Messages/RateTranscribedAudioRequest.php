<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.rateTranscribedAudio
 */
final class RateTranscribedAudioRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7f1d072f;
    
    public string $predicate = 'messages.rateTranscribedAudio';
    
    public function getMethodName(): string
    {
        return 'messages.rateTranscribedAudio';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param int $transcriptionId
     * @param bool $good
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly int $transcriptionId,
        public readonly bool $good
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int64($this->transcriptionId);
        $buffer .= ($this->good ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}