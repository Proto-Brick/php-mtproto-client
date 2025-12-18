<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/groupCall
 */
final class GroupCall extends AbstractGroupCall
{
    public const CONSTRUCTOR_ID = 0x553b0ba1;
    
    public string $predicate = 'groupCall';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $participantsCount
     * @param int $unmutedVideoLimit
     * @param int $version
     * @param true|null $joinMuted
     * @param true|null $canChangeJoinMuted
     * @param true|null $joinDateAsc
     * @param true|null $scheduleStartSubscribed
     * @param true|null $canStartVideo
     * @param true|null $recordVideoActive
     * @param true|null $rtmpStream
     * @param true|null $listenersHidden
     * @param true|null $conference
     * @param true|null $creator
     * @param string|null $title
     * @param int|null $streamDcId
     * @param int|null $recordStartDate
     * @param int|null $scheduleDate
     * @param int|null $unmutedVideoCount
     * @param string|null $inviteLink
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $participantsCount,
        public readonly int $unmutedVideoLimit,
        public readonly int $version,
        public readonly ?true $joinMuted = null,
        public readonly ?true $canChangeJoinMuted = null,
        public readonly ?true $joinDateAsc = null,
        public readonly ?true $scheduleStartSubscribed = null,
        public readonly ?true $canStartVideo = null,
        public readonly ?true $recordVideoActive = null,
        public readonly ?true $rtmpStream = null,
        public readonly ?true $listenersHidden = null,
        public readonly ?true $conference = null,
        public readonly ?true $creator = null,
        public readonly ?string $title = null,
        public readonly ?int $streamDcId = null,
        public readonly ?int $recordStartDate = null,
        public readonly ?int $scheduleDate = null,
        public readonly ?int $unmutedVideoCount = null,
        public readonly ?string $inviteLink = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->joinMuted) {
            $flags |= (1 << 1);
        }
        if ($this->canChangeJoinMuted) {
            $flags |= (1 << 2);
        }
        if ($this->joinDateAsc) {
            $flags |= (1 << 6);
        }
        if ($this->scheduleStartSubscribed) {
            $flags |= (1 << 8);
        }
        if ($this->canStartVideo) {
            $flags |= (1 << 9);
        }
        if ($this->recordVideoActive) {
            $flags |= (1 << 11);
        }
        if ($this->rtmpStream) {
            $flags |= (1 << 12);
        }
        if ($this->listenersHidden) {
            $flags |= (1 << 13);
        }
        if ($this->conference) {
            $flags |= (1 << 14);
        }
        if ($this->creator) {
            $flags |= (1 << 15);
        }
        if ($this->title !== null) {
            $flags |= (1 << 3);
        }
        if ($this->streamDcId !== null) {
            $flags |= (1 << 4);
        }
        if ($this->recordStartDate !== null) {
            $flags |= (1 << 5);
        }
        if ($this->scheduleDate !== null) {
            $flags |= (1 << 7);
        }
        if ($this->unmutedVideoCount !== null) {
            $flags |= (1 << 10);
        }
        if ($this->inviteLink !== null) {
            $flags |= (1 << 16);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int32($this->participantsCount);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->streamDcId);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int32($this->recordStartDate);
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::int32($this->scheduleDate);
        }
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::int32($this->unmutedVideoCount);
        }
        $buffer .= Serializer::int32($this->unmutedVideoLimit);
        $buffer .= Serializer::int32($this->version);
        if ($flags & (1 << 16)) {
            $buffer .= Serializer::bytes($this->inviteLink);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $joinMuted = (($flags & (1 << 1)) !== 0) ? true : null;
        $canChangeJoinMuted = (($flags & (1 << 2)) !== 0) ? true : null;
        $joinDateAsc = (($flags & (1 << 6)) !== 0) ? true : null;
        $scheduleStartSubscribed = (($flags & (1 << 8)) !== 0) ? true : null;
        $canStartVideo = (($flags & (1 << 9)) !== 0) ? true : null;
        $recordVideoActive = (($flags & (1 << 11)) !== 0) ? true : null;
        $rtmpStream = (($flags & (1 << 12)) !== 0) ? true : null;
        $listenersHidden = (($flags & (1 << 13)) !== 0) ? true : null;
        $conference = (($flags & (1 << 14)) !== 0) ? true : null;
        $creator = (($flags & (1 << 15)) !== 0) ? true : null;
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);
        $participantsCount = Deserializer::int32($__payload, $__offset);
        $title = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $streamDcId = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $recordStartDate = (($flags & (1 << 5)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $scheduleDate = (($flags & (1 << 7)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $unmutedVideoCount = (($flags & (1 << 10)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $unmutedVideoLimit = Deserializer::int32($__payload, $__offset);
        $version = Deserializer::int32($__payload, $__offset);
        $inviteLink = (($flags & (1 << 16)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $id,
            $accessHash,
            $participantsCount,
            $unmutedVideoLimit,
            $version,
            $joinMuted,
            $canChangeJoinMuted,
            $joinDateAsc,
            $scheduleStartSubscribed,
            $canStartVideo,
            $recordVideoActive,
            $rtmpStream,
            $listenersHidden,
            $conference,
            $creator,
            $title,
            $streamDcId,
            $recordStartDate,
            $scheduleDate,
            $unmutedVideoCount,
            $inviteLink
        );
    }
}