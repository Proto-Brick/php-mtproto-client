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
    public const CONSTRUCTOR_ID = 0x2d65321f;
    
    public string $predicate = 'draftMessage';
    
    /**
     * @param string $message
     * @param int $date
     * @param true|null $noWebpage
     * @param true|null $invertMedia
     * @param AbstractInputReplyTo|null $replyTo
     * @param list<AbstractMessageEntity>|null $entities
     * @param AbstractInputMedia|null $media
     * @param int|null $effect
     */
    public function __construct(
        public readonly string $message,
        public readonly int $date,
        public readonly ?true $noWebpage = null,
        public readonly ?true $invertMedia = null,
        public readonly ?AbstractInputReplyTo $replyTo = null,
        public readonly ?array $entities = null,
        public readonly ?AbstractInputMedia $media = null,
        public readonly ?int $effect = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->noWebpage) $flags |= (1 << 1);
        if ($this->invertMedia) $flags |= (1 << 6);
        if ($this->replyTo !== null) $flags |= (1 << 4);
        if ($this->entities !== null) $flags |= (1 << 3);
        if ($this->media !== null) $flags |= (1 << 5);
        if ($this->effect !== null) $flags |= (1 << 7);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 4)) {
            $buffer .= $this->replyTo->serialize();
        }
        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->media->serialize();
        }
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::int64($this->effect);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $noWebpage = ($flags & (1 << 1)) ? true : null;
        $invertMedia = ($flags & (1 << 6)) ? true : null;
        $replyTo = ($flags & (1 << 4)) ? AbstractInputReplyTo::deserialize($stream) : null;
        $message = Deserializer::bytes($stream);
        $entities = ($flags & (1 << 3)) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $media = ($flags & (1 << 5)) ? AbstractInputMedia::deserialize($stream) : null;
        $date = Deserializer::int32($stream);
        $effect = ($flags & (1 << 7)) ? Deserializer::int64($stream) : null;

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