<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputQuickReplyShortcut;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputReplyTo;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReplyMarkup;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SuggestedPost;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.sendMessage
 */
final class SendMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xfe05dc9a;
    
    public string $predicate = 'messages.sendMessage';
    
    public function getMethodName(): string
    {
        return 'messages.sendMessage';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $message
     * @param int $randomId
     * @param true|null $noWebpage
     * @param true|null $silent
     * @param true|null $background
     * @param true|null $clearDraft
     * @param true|null $noforwards
     * @param true|null $updateStickersetsOrder
     * @param true|null $invertMedia
     * @param true|null $allowPaidFloodskip
     * @param AbstractInputReplyTo|null $replyTo
     * @param AbstractReplyMarkup|null $replyMarkup
     * @param list<AbstractMessageEntity>|null $entities
     * @param int|null $scheduleDate
     * @param AbstractInputPeer|null $sendAs
     * @param AbstractInputQuickReplyShortcut|null $quickReplyShortcut
     * @param int|null $effect
     * @param int|null $allowPaidStars
     * @param SuggestedPost|null $suggestedPost
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $message,
        public readonly int $randomId,
        public readonly ?true $noWebpage = null,
        public readonly ?true $silent = null,
        public readonly ?true $background = null,
        public readonly ?true $clearDraft = null,
        public readonly ?true $noforwards = null,
        public readonly ?true $updateStickersetsOrder = null,
        public readonly ?true $invertMedia = null,
        public readonly ?true $allowPaidFloodskip = null,
        public readonly ?AbstractInputReplyTo $replyTo = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null,
        public readonly ?array $entities = null,
        public readonly ?int $scheduleDate = null,
        public readonly ?AbstractInputPeer $sendAs = null,
        public readonly ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null,
        public readonly ?int $effect = null,
        public readonly ?int $allowPaidStars = null,
        public readonly ?SuggestedPost $suggestedPost = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->noWebpage) {
            $flags |= (1 << 1);
        }
        if ($this->silent) {
            $flags |= (1 << 5);
        }
        if ($this->background) {
            $flags |= (1 << 6);
        }
        if ($this->clearDraft) {
            $flags |= (1 << 7);
        }
        if ($this->noforwards) {
            $flags |= (1 << 14);
        }
        if ($this->updateStickersetsOrder) {
            $flags |= (1 << 15);
        }
        if ($this->invertMedia) {
            $flags |= (1 << 16);
        }
        if ($this->allowPaidFloodskip) {
            $flags |= (1 << 19);
        }
        if ($this->replyTo !== null) {
            $flags |= (1 << 0);
        }
        if ($this->replyMarkup !== null) {
            $flags |= (1 << 2);
        }
        if ($this->entities !== null) {
            $flags |= (1 << 3);
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
        if ($this->effect !== null) {
            $flags |= (1 << 18);
        }
        if ($this->allowPaidStars !== null) {
            $flags |= (1 << 21);
        }
        if ($this->suggestedPost !== null) {
            $flags |= (1 << 22);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->replyTo->serialize();
        }
        $buffer .= Serializer::bytes($this->message);
        $buffer .= Serializer::int64($this->randomId);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::int32($this->scheduleDate);
        }
        if ($flags & (1 << 13)) {
            $buffer .= $this->sendAs->serialize();
        }
        if ($flags & (1 << 17)) {
            $buffer .= $this->quickReplyShortcut->serialize();
        }
        if ($flags & (1 << 18)) {
            $buffer .= Serializer::int64($this->effect);
        }
        if ($flags & (1 << 21)) {
            $buffer .= Serializer::int64($this->allowPaidStars);
        }
        if ($flags & (1 << 22)) {
            $buffer .= $this->suggestedPost->serialize();
        }
        return $buffer;
    }
}