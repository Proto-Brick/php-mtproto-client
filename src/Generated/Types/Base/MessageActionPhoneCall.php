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
    public const CONSTRUCTOR_ID = 2162236031;
    
    public string $_ = 'messageActionPhoneCall';
    
    /**
     * @param int $callId
     * @param bool|null $video
     * @param AbstractPhoneCallDiscardReason|null $reason
     * @param int|null $duration
     */
    public function __construct(
        public readonly int $callId,
        public readonly ?bool $video = null,
        public readonly ?AbstractPhoneCallDiscardReason $reason = null,
        public readonly ?int $duration = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->video) $flags |= (1 << 2);
        if ($this->reason !== null) $flags |= (1 << 0);
        if ($this->duration !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->callId);
        if ($flags & (1 << 0)) {
            $buffer .= $this->reason->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->duration);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $video = ($flags & (1 << 2)) ? true : null;
        $callId = $deserializer->int64($stream);
        $reason = ($flags & (1 << 0)) ? AbstractPhoneCallDiscardReason::deserialize($deserializer, $stream) : null;
        $duration = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
            return new self(
            $callId,
            $video,
            $reason,
            $duration
        );
    }
}