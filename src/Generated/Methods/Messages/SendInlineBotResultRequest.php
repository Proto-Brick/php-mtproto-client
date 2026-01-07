<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputQuickReplyShortcut;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputReplyTo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.sendInlineBotResult
 */
final class SendInlineBotResultRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc0cf7646;
    
    public string $predicate = 'messages.sendInlineBotResult';
    
    public function getMethodName(): string
    {
        return 'messages.sendInlineBotResult';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $randomId
     * @param int $queryId
     * @param string $id
     * @param true|null $silent
     * @param true|null $background
     * @param true|null $clearDraft
     * @param true|null $hideVia
     * @param AbstractInputReplyTo|null $replyTo
     * @param int|null $scheduleDate
     * @param AbstractInputPeer|null $sendAs
     * @param AbstractInputQuickReplyShortcut|null $quickReplyShortcut
     * @param int|null $allowPaidStars
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $randomId,
        public readonly int $queryId,
        public readonly string $id,
        public readonly ?true $silent = null,
        public readonly ?true $background = null,
        public readonly ?true $clearDraft = null,
        public readonly ?true $hideVia = null,
        public readonly ?AbstractInputReplyTo $replyTo = null,
        public readonly ?int $scheduleDate = null,
        public readonly ?AbstractInputPeer $sendAs = null,
        public readonly ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null,
        public readonly ?int $allowPaidStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->silent) {
            $flags |= (1 << 5);
        }
        if ($this->background) {
            $flags |= (1 << 6);
        }
        if ($this->clearDraft) {
            $flags |= (1 << 7);
        }
        if ($this->hideVia) {
            $flags |= (1 << 11);
        }
        if ($this->replyTo !== null) {
            $flags |= (1 << 0);
        }
        if ($this->scheduleDate !== null) {
            $flags |= (1 << 10);
        }
        if ($this->sendAs !== null) {
            $flags |= (1 << 13);
        }
        if ($this->quickReplyShortcut !== null) {
            $flags |= (1 << 17);
        }
        if ($this->allowPaidStars !== null) {
            $flags |= (1 << 21);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->replyTo->serialize();
        }
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::bytes($this->id);
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::int32($this->scheduleDate);
        }
        if ($flags & (1 << 13)) {
            $buffer .= $this->sendAs->serialize();
        }
        if ($flags & (1 << 17)) {
            $buffer .= $this->quickReplyShortcut->serialize();
        }
        if ($flags & (1 << 21)) {
            $buffer .= Serializer::int64($this->allowPaidStars);
        }
        return $buffer;
    }
}