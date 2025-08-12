<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
     * @param PhoneCallDiscardReason|null $reason
     * @param int|null $duration
     */
    public function __construct(
        public readonly int $callId,
        public readonly ?true $video = null,
        public readonly ?PhoneCallDiscardReason $reason = null,
        public readonly ?int $duration = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->video) $flags |= (1 << 2);
        if ($this->reason !== null) $flags |= (1 << 0);
        if ($this->duration !== null) $flags |= (1 << 1);
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
        $video = ($flags & (1 << 2)) ? true : null;
        $callId = Deserializer::int64($stream);
        $reason = ($flags & (1 << 0)) ? PhoneCallDiscardReason::deserialize($stream) : null;
        $duration = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;

        return new self(
            $callId,
            $video,
            $reason,
            $duration
        );
    }
}