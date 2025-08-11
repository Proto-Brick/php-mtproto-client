<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/groupCall
 */
final class GroupCall extends AbstractGroupCall
{
    public const CONSTRUCTOR_ID = 0xd597650c;
    
    public string $_ = 'groupCall';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $participantsCount
     * @param int $unmutedVideoLimit
     * @param int $version
     * @param bool|null $joinMuted
     * @param bool|null $canChangeJoinMuted
     * @param bool|null $joinDateAsc
     * @param bool|null $scheduleStartSubscribed
     * @param bool|null $canStartVideo
     * @param bool|null $recordVideoActive
     * @param bool|null $rtmpStream
     * @param bool|null $listenersHidden
     * @param string|null $title
     * @param int|null $streamDcId
     * @param int|null $recordStartDate
     * @param int|null $scheduleDate
     * @param int|null $unmutedVideoCount
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $participantsCount,
        public readonly int $unmutedVideoLimit,
        public readonly int $version,
        public readonly ?bool $joinMuted = null,
        public readonly ?bool $canChangeJoinMuted = null,
        public readonly ?bool $joinDateAsc = null,
        public readonly ?bool $scheduleStartSubscribed = null,
        public readonly ?bool $canStartVideo = null,
        public readonly ?bool $recordVideoActive = null,
        public readonly ?bool $rtmpStream = null,
        public readonly ?bool $listenersHidden = null,
        public readonly ?string $title = null,
        public readonly ?int $streamDcId = null,
        public readonly ?int $recordStartDate = null,
        public readonly ?int $scheduleDate = null,
        public readonly ?int $unmutedVideoCount = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->joinMuted) $flags |= (1 << 1);
        if ($this->canChangeJoinMuted) $flags |= (1 << 2);
        if ($this->joinDateAsc) $flags |= (1 << 6);
        if ($this->scheduleStartSubscribed) $flags |= (1 << 8);
        if ($this->canStartVideo) $flags |= (1 << 9);
        if ($this->recordVideoActive) $flags |= (1 << 11);
        if ($this->rtmpStream) $flags |= (1 << 12);
        if ($this->listenersHidden) $flags |= (1 << 13);
        if ($this->title !== null) $flags |= (1 << 3);
        if ($this->streamDcId !== null) $flags |= (1 << 4);
        if ($this->recordStartDate !== null) $flags |= (1 << 5);
        if ($this->scheduleDate !== null) $flags |= (1 << 7);
        if ($this->unmutedVideoCount !== null) $flags |= (1 << 10);
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
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $joinMuted = ($flags & (1 << 1)) ? true : null;
        $canChangeJoinMuted = ($flags & (1 << 2)) ? true : null;
        $joinDateAsc = ($flags & (1 << 6)) ? true : null;
        $scheduleStartSubscribed = ($flags & (1 << 8)) ? true : null;
        $canStartVideo = ($flags & (1 << 9)) ? true : null;
        $recordVideoActive = ($flags & (1 << 11)) ? true : null;
        $rtmpStream = ($flags & (1 << 12)) ? true : null;
        $listenersHidden = ($flags & (1 << 13)) ? true : null;
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        $participantsCount = Deserializer::int32($stream);
        $title = ($flags & (1 << 3)) ? Deserializer::bytes($stream) : null;
        $streamDcId = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;
        $recordStartDate = ($flags & (1 << 5)) ? Deserializer::int32($stream) : null;
        $scheduleDate = ($flags & (1 << 7)) ? Deserializer::int32($stream) : null;
        $unmutedVideoCount = ($flags & (1 << 10)) ? Deserializer::int32($stream) : null;
        $unmutedVideoLimit = Deserializer::int32($stream);
        $version = Deserializer::int32($stream);
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
            $title,
            $streamDcId,
            $recordStartDate,
            $scheduleDate,
            $unmutedVideoCount
        );
    }
}