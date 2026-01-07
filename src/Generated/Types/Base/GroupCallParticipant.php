<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/groupCallParticipant
 */
final class GroupCallParticipant extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2a3dc7ac;
    
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
     * @param int|null $paidStarsTotal
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
        public readonly ?GroupCallParticipantVideo $presentation = null,
        public readonly ?int $paidStarsTotal = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->muted) {
            $flags |= (1 << 0);
        }
        if ($this->left) {
            $flags |= (1 << 1);
        }
        if ($this->canSelfUnmute) {
            $flags |= (1 << 2);
        }
        if ($this->justJoined) {
            $flags |= (1 << 4);
        }
        if ($this->versioned) {
            $flags |= (1 << 5);
        }
        if ($this->min) {
            $flags |= (1 << 8);
        }
        if ($this->mutedByYou) {
            $flags |= (1 << 9);
        }
        if ($this->volumeByAdmin) {
            $flags |= (1 << 10);
        }
        if ($this->self) {
            $flags |= (1 << 12);
        }
        if ($this->videoJoined) {
            $flags |= (1 << 15);
        }
        if ($this->activeDate !== null) {
            $flags |= (1 << 3);
        }
        if ($this->volume !== null) {
            $flags |= (1 << 7);
        }
        if ($this->about !== null) {
            $flags |= (1 << 11);
        }
        if ($this->raiseHandRating !== null) {
            $flags |= (1 << 13);
        }
        if ($this->video !== null) {
            $flags |= (1 << 6);
        }
        if ($this->presentation !== null) {
            $flags |= (1 << 14);
        }
        if ($this->paidStarsTotal !== null) {
            $flags |= (1 << 16);
        }
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
        if ($flags & (1 << 16)) {
            $buffer .= Serializer::int64($this->paidStarsTotal);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $muted = (($flags & (1 << 0)) !== 0) ? true : null;
        $left = (($flags & (1 << 1)) !== 0) ? true : null;
        $canSelfUnmute = (($flags & (1 << 2)) !== 0) ? true : null;
        $justJoined = (($flags & (1 << 4)) !== 0) ? true : null;
        $versioned = (($flags & (1 << 5)) !== 0) ? true : null;
        $min = (($flags & (1 << 8)) !== 0) ? true : null;
        $mutedByYou = (($flags & (1 << 9)) !== 0) ? true : null;
        $volumeByAdmin = (($flags & (1 << 10)) !== 0) ? true : null;
        $self = (($flags & (1 << 12)) !== 0) ? true : null;
        $videoJoined = (($flags & (1 << 15)) !== 0) ? true : null;
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $activeDate = (($flags & (1 << 3)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $source = Deserializer::int32($__payload, $__offset);
        $volume = (($flags & (1 << 7)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $about = (($flags & (1 << 11)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $raiseHandRating = (($flags & (1 << 13)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $video = (($flags & (1 << 6)) !== 0) ? GroupCallParticipantVideo::deserialize($__payload, $__offset) : null;
        $presentation = (($flags & (1 << 14)) !== 0) ? GroupCallParticipantVideo::deserialize($__payload, $__offset) : null;
        $paidStarsTotal = (($flags & (1 << 16)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;

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
            $presentation,
            $paidStarsTotal
        );
    }
}