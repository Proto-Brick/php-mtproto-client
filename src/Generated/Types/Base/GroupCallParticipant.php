<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/groupCallParticipant
 */
final class GroupCallParticipant extends TlObject
{
    public const CONSTRUCTOR_ID = 0xeba636fe;
    
    public string $predicate = 'groupCallParticipant';
    
    /**
     * @param AbstractPeer $peer
     * @param int $date
     * @param int $source
     * @param true|null $muted
     * @param true|null $left
     * @param true|null $canSelfUnmute
     * @param true|null $justJoined
     * @param true|null $versioned
     * @param true|null $min
     * @param true|null $mutedByYou
     * @param true|null $volumeByAdmin
     * @param true|null $self
     * @param true|null $videoJoined
     * @param int|null $activeDate
     * @param int|null $volume
     * @param string|null $about
     * @param int|null $raiseHandRating
     * @param GroupCallParticipantVideo|null $video
     * @param GroupCallParticipantVideo|null $presentation
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $date,
        public readonly int $source,
        public readonly ?true $muted = null,
        public readonly ?true $left = null,
        public readonly ?true $canSelfUnmute = null,
        public readonly ?true $justJoined = null,
        public readonly ?true $versioned = null,
        public readonly ?true $min = null,
        public readonly ?true $mutedByYou = null,
        public readonly ?true $volumeByAdmin = null,
        public readonly ?true $self = null,
        public readonly ?true $videoJoined = null,
        public readonly ?int $activeDate = null,
        public readonly ?int $volume = null,
        public readonly ?string $about = null,
        public readonly ?int $raiseHandRating = null,
        public readonly ?GroupCallParticipantVideo $video = null,
        public readonly ?GroupCallParticipantVideo $presentation = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
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
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->activeDate);
        }
        $buffer .= Serializer::int32($this->source);
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::int32($this->volume);
        }
        if ($flags & (1 << 11)) {
            $buffer .= Serializer::bytes($this->about);
        }
        if ($flags & (1 << 13)) {
            $buffer .= Serializer::int64($this->raiseHandRating);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $this->video->serialize();
        }
        if ($flags & (1 << 14)) {
            $buffer .= $this->presentation->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
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
        $peer = AbstractPeer::deserialize($stream);
        $date = Deserializer::int32($stream);
        $activeDate = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;
        $source = Deserializer::int32($stream);
        $volume = ($flags & (1 << 7)) ? Deserializer::int32($stream) : null;
        $about = ($flags & (1 << 11)) ? Deserializer::bytes($stream) : null;
        $raiseHandRating = ($flags & (1 << 13)) ? Deserializer::int64($stream) : null;
        $video = ($flags & (1 << 6)) ? GroupCallParticipantVideo::deserialize($stream) : null;
        $presentation = ($flags & (1 << 14)) ? GroupCallParticipantVideo::deserialize($stream) : null;

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