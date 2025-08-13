<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionConferenceCall
 */
final class MessageActionConferenceCall extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x2ffe2f7a;
    
    public string $predicate = 'messageActionConferenceCall';
    
    /**
     * @param int $callId
     * @param true|null $missed
     * @param true|null $active
     * @param true|null $video
     * @param int|null $duration
     * @param list<AbstractPeer>|null $otherParticipants
     */
    public function __construct(
        public readonly int $callId,
        public readonly ?true $missed = null,
        public readonly ?true $active = null,
        public readonly ?true $video = null,
        public readonly ?int $duration = null,
        public readonly ?array $otherParticipants = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->missed) {
            $flags |= (1 << 0);
        }
        if ($this->active) {
            $flags |= (1 << 1);
        }
        if ($this->video) {
            $flags |= (1 << 4);
        }
        if ($this->duration !== null) {
            $flags |= (1 << 2);
        }
        if ($this->otherParticipants !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->callId);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->duration);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->otherParticipants);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $missed = (($flags & (1 << 0)) !== 0) ? true : null;
        $active = (($flags & (1 << 1)) !== 0) ? true : null;
        $video = (($flags & (1 << 4)) !== 0) ? true : null;
        $callId = Deserializer::int64($stream);
        $duration = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($stream) : null;
        $otherParticipants = (($flags & (1 << 3)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractPeer::class, 'deserialize']) : null;

        return new self(
            $callId,
            $missed,
            $active,
            $video,
            $duration,
            $otherParticipants
        );
    }
}