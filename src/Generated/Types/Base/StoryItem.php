<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/storyItem
 */
final class StoryItem extends AbstractStoryItem
{
    public const CONSTRUCTOR_ID = 0x79b26a24;
    
    public string $predicate = 'storyItem';
    
    /**
     * @param int $id
     * @param int $date
     * @param int $expireDate
     * @param AbstractMessageMedia $media
     * @param true|null $pinned
     * @param true|null $public
     * @param true|null $closeFriends
     * @param true|null $min
     * @param true|null $noforwards
     * @param true|null $edited
     * @param true|null $contacts
     * @param true|null $selectedContacts
     * @param true|null $out
     * @param AbstractPeer|null $fromId
     * @param StoryFwdHeader|null $fwdFrom
     * @param string|null $caption
     * @param list<AbstractMessageEntity>|null $entities
     * @param list<AbstractMediaArea>|null $mediaAreas
     * @param list<AbstractPrivacyRule>|null $privacy
     * @param StoryViews|null $views
     * @param AbstractReaction|null $sentReaction
     */
    public function __construct(
        public readonly int $id,
        public readonly int $date,
        public readonly int $expireDate,
        public readonly AbstractMessageMedia $media,
        public readonly ?true $pinned = null,
        public readonly ?true $public = null,
        public readonly ?true $closeFriends = null,
        public readonly ?true $min = null,
        public readonly ?true $noforwards = null,
        public readonly ?true $edited = null,
        public readonly ?true $contacts = null,
        public readonly ?true $selectedContacts = null,
        public readonly ?true $out = null,
        public readonly ?AbstractPeer $fromId = null,
        public readonly ?StoryFwdHeader $fwdFrom = null,
        public readonly ?string $caption = null,
        public readonly ?array $entities = null,
        public readonly ?array $mediaAreas = null,
        public readonly ?array $privacy = null,
        public readonly ?StoryViews $views = null,
        public readonly ?AbstractReaction $sentReaction = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 5);
        if ($this->public) $flags |= (1 << 7);
        if ($this->closeFriends) $flags |= (1 << 8);
        if ($this->min) $flags |= (1 << 9);
        if ($this->noforwards) $flags |= (1 << 10);
        if ($this->edited) $flags |= (1 << 11);
        if ($this->contacts) $flags |= (1 << 12);
        if ($this->selectedContacts) $flags |= (1 << 13);
        if ($this->out) $flags |= (1 << 16);
        if ($this->fromId !== null) $flags |= (1 << 18);
        if ($this->fwdFrom !== null) $flags |= (1 << 17);
        if ($this->caption !== null) $flags |= (1 << 0);
        if ($this->entities !== null) $flags |= (1 << 1);
        if ($this->mediaAreas !== null) $flags |= (1 << 14);
        if ($this->privacy !== null) $flags |= (1 << 2);
        if ($this->views !== null) $flags |= (1 << 3);
        if ($this->sentReaction !== null) $flags |= (1 << 15);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 18)) {
            $buffer .= $this->fromId->serialize();
        }
        if ($flags & (1 << 17)) {
            $buffer .= $this->fwdFrom->serialize();
        }
        $buffer .= Serializer::int32($this->expireDate);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->caption);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        $buffer .= $this->media->serialize();
        if ($flags & (1 << 14)) {
            $buffer .= Serializer::vectorOfObjects($this->mediaAreas);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::vectorOfObjects($this->privacy);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->views->serialize();
        }
        if ($flags & (1 << 15)) {
            $buffer .= $this->sentReaction->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $pinned = ($flags & (1 << 5)) ? true : null;
        $public = ($flags & (1 << 7)) ? true : null;
        $closeFriends = ($flags & (1 << 8)) ? true : null;
        $min = ($flags & (1 << 9)) ? true : null;
        $noforwards = ($flags & (1 << 10)) ? true : null;
        $edited = ($flags & (1 << 11)) ? true : null;
        $contacts = ($flags & (1 << 12)) ? true : null;
        $selectedContacts = ($flags & (1 << 13)) ? true : null;
        $out = ($flags & (1 << 16)) ? true : null;
        $id = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $fromId = ($flags & (1 << 18)) ? AbstractPeer::deserialize($stream) : null;
        $fwdFrom = ($flags & (1 << 17)) ? StoryFwdHeader::deserialize($stream) : null;
        $expireDate = Deserializer::int32($stream);
        $caption = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $entities = ($flags & (1 << 1)) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $media = AbstractMessageMedia::deserialize($stream);
        $mediaAreas = ($flags & (1 << 14)) ? Deserializer::vectorOfObjects($stream, [AbstractMediaArea::class, 'deserialize']) : null;
        $privacy = ($flags & (1 << 2)) ? Deserializer::vectorOfObjects($stream, [AbstractPrivacyRule::class, 'deserialize']) : null;
        $views = ($flags & (1 << 3)) ? StoryViews::deserialize($stream) : null;
        $sentReaction = ($flags & (1 << 15)) ? AbstractReaction::deserialize($stream) : null;

        return new self(
            $id,
            $date,
            $expireDate,
            $media,
            $pinned,
            $public,
            $closeFriends,
            $min,
            $noforwards,
            $edited,
            $contacts,
            $selectedContacts,
            $out,
            $fromId,
            $fwdFrom,
            $caption,
            $entities,
            $mediaAreas,
            $privacy,
            $views,
            $sentReaction
        );
    }
}