<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReplyMarkup;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.editMessage
 */
final class EditMessageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3755032581;
    
    public string $_ = 'messages.editMessage';
    
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
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
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
        public readonly ?bool $noWebpage = null,
        public readonly ?bool $invertMedia = null,
        public readonly ?string $message = null,
        public readonly ?AbstractInputMedia $media = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null,
        public readonly ?array $entities = null,
        public readonly ?int $scheduleDate = null,
        public readonly ?int $quickReplyShortcutId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->noWebpage) $flags |= (1 << 1);
        if ($this->invertMedia) $flags |= (1 << 16);
        if ($this->message !== null) $flags |= (1 << 11);
        if ($this->media !== null) $flags |= (1 << 14);
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        if ($this->entities !== null) $flags |= (1 << 3);
        if ($this->scheduleDate !== null) $flags |= (1 << 15);
        if ($this->quickReplyShortcutId !== null) $flags |= (1 << 17);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->id);
        if ($flags & (1 << 11)) {
            $buffer .= $serializer->bytes($this->message);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $this->media->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize($serializer);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 15)) {
            $buffer .= $serializer->int32($this->scheduleDate);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $serializer->int32($this->quickReplyShortcutId);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}