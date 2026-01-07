<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.toggleSuggestedPostApproval
 */
final class ToggleSuggestedPostApprovalRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8107455c;
    
    public string $predicate = 'messages.toggleSuggestedPostApproval';
    
    public function getMethodName(): string
    {
        return 'messages.toggleSuggestedPostApproval';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param true|null $reject
     * @param int|null $scheduleDate
     * @param string|null $rejectComment
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly ?true $reject = null,
        public readonly ?int $scheduleDate = null,
        public readonly ?string $rejectComment = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->reject) {
            $flags |= (1 << 1);
        }
        if ($this->scheduleDate !== null) {
            $flags |= (1 << 0);
        }
        if ($this->rejectComment !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->scheduleDate);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->rejectComment);
        }
        return $buffer;
    }
}