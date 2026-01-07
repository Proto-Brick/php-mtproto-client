<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.deleteGroupCallParticipantMessages
 */
final class DeleteGroupCallParticipantMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1dbfeca0;
    
    public string $predicate = 'phone.deleteGroupCallParticipantMessages';
    
    public function getMethodName(): string
    {
        return 'phone.deleteGroupCallParticipantMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param AbstractInputPeer $participant
     * @param true|null $reportSpam
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly AbstractInputPeer $participant,
        public readonly ?true $reportSpam = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->reportSpam) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        $buffer .= $this->participant->serialize();
        return $buffer;
    }
}