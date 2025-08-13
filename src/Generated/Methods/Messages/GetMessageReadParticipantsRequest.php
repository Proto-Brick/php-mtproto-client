<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ReadParticipantDate;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getMessageReadParticipants
 */
final class GetMessageReadParticipantsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x31c1c44f;
    
    public string $predicate = 'messages.getMessageReadParticipants';
    
    public function getMethodName(): string
    {
        return 'messages.getMessageReadParticipants';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . ReadParticipantDate::class . '>';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        return $buffer;
    }
}