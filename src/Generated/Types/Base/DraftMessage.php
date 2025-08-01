<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/draftMessage
 */
final class DraftMessage extends AbstractDraftMessage
{
    public const CONSTRUCTOR_ID = 761606687;
    
    public string $_ = 'draftMessage';
    
    /**
     * @param string $message
     * @param int $date
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
     * @param AbstractInputReplyTo|null $replyTo
     * @param list<AbstractMessageEntity>|null $entities
     * @param AbstractInputMedia|null $media
     * @param int|null $effect
     */
    public function __construct(
        public readonly string $message,
        public readonly int $date,
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
        $buffer .= $serializer->bytes($this->message);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->media->serialize($serializer);
        }
        $buffer .= $serializer->int32($this->date);
        if ($flags & (1 << 7)) {
            $buffer .= $serializer->int64($this->effect);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $noWebpage = ($flags & (1 << 1)) ? true : null;
        $invertMedia = ($flags & (1 << 6)) ? true : null;
        $replyTo = ($flags & (1 << 4)) ? AbstractInputReplyTo::deserialize($deserializer, $stream) : null;
        $message = $deserializer->bytes($stream);
        $entities = ($flags & (1 << 3)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $media = ($flags & (1 << 5)) ? AbstractInputMedia::deserialize($deserializer, $stream) : null;
        $date = $deserializer->int32($stream);
        $effect = ($flags & (1 << 7)) ? $deserializer->int64($stream) : null;
            return new self(
            $message,
            $date,
            $noWebpage,
            $invertMedia,
            $replyTo,
            $entities,
            $media,
            $effect
        );
    }
}