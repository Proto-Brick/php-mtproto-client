<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionPhoneCall
 */
final class MessageActionPhoneCall extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x80e11a7f;
    
    public string $predicate = 'messageActionPhoneCall';
    
    /**
     * @param int $callId
     * @param true|null $video
     * @param AbstractPhoneCallDiscardReason|null $reason
     * @param int|null $duration
     */
    public function __construct(
        public readonly int $callId,
        public readonly ?true $video = null,
        public readonly ?AbstractPhoneCallDiscardReason $reason = null,
        public readonly ?int $duration = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->video) {
            $flags |= (1 << 2);
        }
        if ($this->reason !== null) {
            $flags |= (1 << 0);
        }
        if ($this->duration !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->callId);
        if ($flags & (1 << 0)) {
            $buffer .= $this->reason->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->duration);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $video = (($flags & (1 << 2)) !== 0) ? true : null;
        $callId = Deserializer::int64($stream);
        $reason = (($flags & (1 << 0)) !== 0) ? AbstractPhoneCallDiscardReason::deserialize($stream) : null;
        $duration = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $callId,
            $video,
            $reason,
            $duration
        );
    }
}