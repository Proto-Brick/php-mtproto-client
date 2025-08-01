<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputQuickReplyShortcut;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputReplyTo;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendInlineBotResult
 */
final class SendInlineBotResultRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1052698730;
    
    public string $_ = 'messages.sendInlineBotResult';
    
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
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $hideVia
     * @param AbstractInputReplyTo|null $replyTo
     * @param int|null $scheduleDate
     * @param AbstractInputPeer|null $sendAs
     * @param AbstractInputQuickReplyShortcut|null $quickReplyShortcut
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $randomId,
        public readonly int $queryId,
        public readonly string $id,
        public readonly ?bool $silent = null,
        public readonly ?bool $background = null,
        public readonly ?bool $clearDraft = null,
        public readonly ?bool $hideVia = null,
        public readonly ?AbstractInputReplyTo $replyTo = null,
        public readonly ?int $scheduleDate = null,
        public readonly ?AbstractInputPeer $sendAs = null,
        public readonly ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->silent) $flags |= (1 << 5);
        if ($this->background) $flags |= (1 << 6);
        if ($this->clearDraft) $flags |= (1 << 7);
        if ($this->hideVia) $flags |= (1 << 11);
        if ($this->replyTo !== null) $flags |= (1 << 0);
        if ($this->scheduleDate !== null) $flags |= (1 << 10);
        if ($this->sendAs !== null) $flags |= (1 << 13);
        if ($this->quickReplyShortcut !== null) $flags |= (1 << 17);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $this->replyTo->serialize($serializer);
        }
        $buffer .= $serializer->int64($this->randomId);
        $buffer .= $serializer->int64($this->queryId);
        $buffer .= $serializer->bytes($this->id);
        if ($flags & (1 << 10)) {
            $buffer .= $serializer->int32($this->scheduleDate);
        }
        if ($flags & (1 << 13)) {
            $buffer .= $this->sendAs->serialize($serializer);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $this->quickReplyShortcut->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}