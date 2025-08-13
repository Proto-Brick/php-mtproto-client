<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.editGroupCallParticipant
 */
final class EditGroupCallParticipantRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa5273abf;
    
    public string $predicate = 'phone.editGroupCallParticipant';
    
    public function getMethodName(): string
    {
        return 'phone.editGroupCallParticipant';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param AbstractInputPeer $participant
     * @param bool|null $muted
     * @param int|null $volume
     * @param bool|null $raiseHand
     * @param bool|null $videoStopped
     * @param bool|null $videoPaused
     * @param bool|null $presentationPaused
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly AbstractInputPeer $participant,
        public readonly ?bool $muted = null,
        public readonly ?int $volume = null,
        public readonly ?bool $raiseHand = null,
        public readonly ?bool $videoStopped = null,
        public readonly ?bool $videoPaused = null,
        public readonly ?bool $presentationPaused = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->muted !== null) {
            $flags |= (1 << 0);
        }
        if ($this->volume !== null) {
            $flags |= (1 << 1);
        }
        if ($this->raiseHand !== null) {
            $flags |= (1 << 2);
        }
        if ($this->videoStopped !== null) {
            $flags |= (1 << 3);
        }
        if ($this->videoPaused !== null) {
            $flags |= (1 << 4);
        }
        if ($this->presentationPaused !== null) {
            $flags |= (1 << 5);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->call->serialize();
        $buffer .= $this->participant->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= ($this->muted ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->volume);
        }
        if ($flags & (1 << 2)) {
            $buffer .= ($this->raiseHand ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 3)) {
            $buffer .= ($this->videoStopped ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 4)) {
            $buffer .= ($this->videoPaused ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 5)) {
            $buffer .= ($this->presentationPaused ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        return $buffer;
    }
}