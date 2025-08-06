<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputQuickReplyShortcut;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputReplyTo;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReplyMarkup;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendMedia
 */
final class SendMediaRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7852834e;
    
    public string $_ = 'messages.sendMedia';
    
    public function getMethodName(): string
    {
        return 'messages.sendMedia';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputMedia $media
     * @param string $message
     * @param int $randomId
     * @param bool|null $silent
     * @param bool|null $background
     * @param bool|null $clearDraft
     * @param bool|null $noforwards
     * @param bool|null $updateStickersetsOrder
     * @param bool|null $invertMedia
     * @param bool|null $allowPaidFloodskip
     * @param AbstractInputReplyTo|null $replyTo
     * @param AbstractReplyMarkup|null $replyMarkup
     * @param list<AbstractMessageEntity>|null $entities
     * @param int|null $scheduleDate
     * @param AbstractInputPeer|null $sendAs
     * @param AbstractInputQuickReplyShortcut|null $quickReplyShortcut
     * @param int|null $effect
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputMedia $media,
        public readonly string $message,
        public readonly int $randomId,
        public readonly ?bool $silent = null,
        public readonly ?bool $background = null,
        public readonly ?bool $clearDraft = null,
        public readonly ?bool $noforwards = null,
        public readonly ?bool $updateStickersetsOrder = null,
        public readonly ?bool $invertMedia = null,
        public readonly ?bool $allowPaidFloodskip = null,
        public readonly ?AbstractInputReplyTo $replyTo = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null,
        public readonly ?array $entities = null,
        public readonly ?int $scheduleDate = null,
        public readonly ?AbstractInputPeer $sendAs = null,
        public readonly ?AbstractInputQuickReplyShortcut $quickReplyShortcut = null,
        public readonly ?int $effect = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->silent) $flags |= (1 << 5);
        if ($this->background) $flags |= (1 << 6);
        if ($this->clearDraft) $flags |= (1 << 7);
        if ($this->noforwards) $flags |= (1 << 14);
        if ($this->updateStickersetsOrder) $flags |= (1 << 15);
        if ($this->invertMedia) $flags |= (1 << 16);
        if ($this->allowPaidFloodskip) $flags |= (1 << 19);
        if ($this->replyTo !== null) $flags |= (1 << 0);
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        if ($this->entities !== null) $flags |= (1 << 3);
        if ($this->scheduleDate !== null) $flags |= (1 << 10);
        if ($this->sendAs !== null) $flags |= (1 << 13);
        if ($this->quickReplyShortcut !== null) $flags |= (1 << 17);
        if ($this->effect !== null) $flags |= (1 << 18);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $this->replyTo->serialize($serializer);
        }
        $buffer .= $this->media->serialize($serializer);
        $buffer .= $serializer->bytes($this->message);
        $buffer .= $serializer->int64($this->randomId);
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize($serializer);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 10)) {
            $buffer .= $serializer->int32($this->scheduleDate);
        }
        if ($flags & (1 << 13)) {
            $buffer .= $this->sendAs->serialize($serializer);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $this->quickReplyShortcut->serialize($serializer);
        }
        if ($flags & (1 << 18)) {
            $buffer .= $serializer->int64($this->effect);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}