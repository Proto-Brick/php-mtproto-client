<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/groupCallParticipant
 */
final class GroupCallParticipant extends AbstractGroupCallParticipant
{
    public const CONSTRUCTOR_ID = 3953538814;
    
    public string $_ = 'groupCallParticipant';
    
    /**
     * @param AbstractPeer $peer
     * @param int $date
     * @param int $source
     * @param bool|null $muted
     * @param bool|null $left
     * @param bool|null $canSelfUnmute
     * @param bool|null $justJoined
     * @param bool|null $versioned
     * @param bool|null $min
     * @param bool|null $mutedByYou
     * @param bool|null $volumeByAdmin
     * @param bool|null $self
     * @param bool|null $videoJoined
     * @param int|null $activeDate
     * @param int|null $volume
     * @param string|null $about
     * @param int|null $raiseHandRating
     * @param AbstractGroupCallParticipantVideo|null $video
     * @param AbstractGroupCallParticipantVideo|null $presentation
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $date,
        public readonly int $source,
        public readonly ?bool $muted = null,
        public readonly ?bool $left = null,
        public readonly ?bool $canSelfUnmute = null,
        public readonly ?bool $justJoined = null,
        public readonly ?bool $versioned = null,
        public readonly ?bool $min = null,
        public readonly ?bool $mutedByYou = null,
        public readonly ?bool $volumeByAdmin = null,
        public readonly ?bool $self = null,
        public readonly ?bool $videoJoined = null,
        public readonly ?int $activeDate = null,
        public readonly ?int $volume = null,
        public readonly ?string $about = null,
        public readonly ?int $raiseHandRating = null,
        public readonly ?AbstractGroupCallParticipantVideo $video = null,
        public readonly ?AbstractGroupCallParticipantVideo $presentation = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->muted) $flags |= (1 << 0);
        if ($this->left) $flags |= (1 << 1);
        if ($this->canSelfUnmute) $flags |= (1 << 2);
        if ($this->justJoined) $flags |= (1 << 4);
        if ($this->versioned) $flags |= (1 << 5);
        if ($this->min) $flags |= (1 << 8);
        if ($this->mutedByYou) $flags |= (1 << 9);
        if ($this->volumeByAdmin) $flags |= (1 << 10);
        if ($this->self) $flags |= (1 << 12);
        if ($this->videoJoined) $flags |= (1 << 15);
        if ($this->activeDate !== null) $flags |= (1 << 3);
        if ($this->volume !== null) $flags |= (1 << 7);
        if ($this->about !== null) $flags |= (1 << 11);
        if ($this->raiseHandRating !== null) $flags |= (1 << 13);
        if ($this->video !== null) $flags |= (1 << 6);
        if ($this->presentation !== null) $flags |= (1 << 14);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->date);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->int32($this->activeDate);
        }
        $buffer .= $serializer->int32($this->source);
        if ($flags & (1 << 7)) {
            $buffer .= $serializer->int32($this->volume);
        }
        if ($flags & (1 << 11)) {
            $buffer .= $serializer->bytes($this->about);
        }
        if ($flags & (1 << 13)) {
            $buffer .= $serializer->int64($this->raiseHandRating);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $this->video->serialize($serializer);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $this->presentation->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $muted = ($flags & (1 << 0)) ? true : null;
        $left = ($flags & (1 << 1)) ? true : null;
        $canSelfUnmute = ($flags & (1 << 2)) ? true : null;
        $justJoined = ($flags & (1 << 4)) ? true : null;
        $versioned = ($flags & (1 << 5)) ? true : null;
        $min = ($flags & (1 << 8)) ? true : null;
        $mutedByYou = ($flags & (1 << 9)) ? true : null;
        $volumeByAdmin = ($flags & (1 << 10)) ? true : null;
        $self = ($flags & (1 << 12)) ? true : null;
        $videoJoined = ($flags & (1 << 15)) ? true : null;
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $date = $deserializer->int32($stream);
        $activeDate = ($flags & (1 << 3)) ? $deserializer->int32($stream) : null;
        $source = $deserializer->int32($stream);
        $volume = ($flags & (1 << 7)) ? $deserializer->int32($stream) : null;
        $about = ($flags & (1 << 11)) ? $deserializer->bytes($stream) : null;
        $raiseHandRating = ($flags & (1 << 13)) ? $deserializer->int64($stream) : null;
        $video = ($flags & (1 << 6)) ? AbstractGroupCallParticipantVideo::deserialize($deserializer, $stream) : null;
        $presentation = ($flags & (1 << 14)) ? AbstractGroupCallParticipantVideo::deserialize($deserializer, $stream) : null;
            return new self(
            $peer,
            $date,
            $source,
            $muted,
            $left,
            $canSelfUnmute,
            $justJoined,
            $versioned,
            $min,
            $mutedByYou,
            $volumeByAdmin,
            $self,
            $videoJoined,
            $activeDate,
            $volume,
            $about,
            $raiseHandRating,
            $video,
            $presentation
        );
    }
}