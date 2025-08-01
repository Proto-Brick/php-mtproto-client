<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputReplyTo;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.saveDraft
 */
final class SaveDraftRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3547514318;
    
    public string $_ = 'messages.saveDraft';
    
    public function getMethodName(): string
    {
        return 'messages.saveDraft';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $message
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
     * @param AbstractInputReplyTo|null $replyTo
     * @param list<AbstractMessageEntity>|null $entities
     * @param AbstractInputMedia|null $media
     * @param int|null $effect
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $message,
        public readonly ?bool $noWebpage = null,
        public readonly ?bool $invertMedia = null,
        public readonly ?AbstractInputReplyTo $replyTo = null,
        public readonly ?array $entities = null,
        public readonly ?AbstractInputMedia $media = null,
        public readonly ?int $effect = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->noWebpage) $flags |= (1 << 1);
        if ($this->invertMedia) $flags |= (1 << 6);
        if ($this->replyTo !== null) $flags |= (1 << 4);
        if ($this->entities !== null) $flags |= (1 << 3);
        if ($this->media !== null) $flags |= (1 << 5);
        if ($this->effect !== null) $flags |= (1 << 7);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 4)) {
            $buffer .= $this->replyTo->serialize($serializer);
        }
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->message);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->media->serialize($serializer);
        }
        if ($flags & (1 << 7)) {
            $buffer .= $serializer->int64($this->effect);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}