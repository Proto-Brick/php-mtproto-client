<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessageEntity;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReplyMarkup;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.editMessage
 */
final class EditMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xdfd14005;
    
    public string $predicate = 'messages.editMessage';
    
    public function getMethodName(): string
    {
        return 'messages.editMessage';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param true|null $noWebpage
     * @param true|null $invertMedia
     * @param string|null $message
     * @param AbstractInputMedia|null $media
     * @param AbstractReplyMarkup|null $replyMarkup
     * @param list<AbstractMessageEntity>|null $entities
     * @param int|null $scheduleDate
     * @param int|null $quickReplyShortcutId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly ?true $noWebpage = null,
        public readonly ?true $invertMedia = null,
        public readonly ?string $message = null,
        public readonly ?AbstractInputMedia $media = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null,
        public readonly ?array $entities = null,
        public readonly ?int $scheduleDate = null,
        public readonly ?int $quickReplyShortcutId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->noWebpage) {
            $flags |= (1 << 1);
        }
        if ($this->invertMedia) {
            $flags |= (1 << 16);
        }
        if ($this->message !== null) {
            $flags |= (1 << 11);
        }
        if ($this->media !== null) {
            $flags |= (1 << 14);
        }
        if ($this->replyMarkup !== null) {
            $flags |= (1 << 2);
        }
        if ($this->entities !== null) {
            $flags |= (1 << 3);
        }
        if ($this->scheduleDate !== null) {
            $flags |= (1 << 15);
        }
        if ($this->quickReplyShortcutId !== null) {
            $flags |= (1 << 17);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        if ($flags & (1 << 11)) {
            $buffer .= Serializer::bytes($this->message);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $this->media->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 15)) {
            $buffer .= Serializer::int32($this->scheduleDate);
        }
        if ($flags & (1 << 17)) {
            $buffer .= Serializer::int32($this->quickReplyShortcutId);
        }
        return $buffer;
    }
}