<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/phoneCallDiscarded
 */
final class PhoneCallDiscarded extends AbstractPhoneCall
{
    public const CONSTRUCTOR_ID = 0x50ca4de1;
    
    public string $predicate = 'phoneCallDiscarded';
    
    /**
     * @param int $id
     * @param true|null $needRating
     * @param true|null $needDebug
     * @param true|null $video
     * @param AbstractPhoneCallDiscardReason|null $reason
     * @param int|null $duration
     */
    public function __construct(
        public readonly int $id,
        public readonly ?true $needRating = null,
        public readonly ?true $needDebug = null,
        public readonly ?true $video = null,
        public readonly ?AbstractPhoneCallDiscardReason $reason = null,
        public readonly ?int $duration = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->needRating) {
            $flags |= (1 << 2);
        }
        if ($this->needDebug) {
            $flags |= (1 << 3);
        }
        if ($this->video) {
            $flags |= (1 << 6);
        }
        if ($this->reason !== null) {
            $flags |= (1 << 0);
        }
        if ($this->duration !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->reason->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->duration);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $needRating = (($flags & (1 << 2)) !== 0) ? true : null;
        $needDebug = (($flags & (1 << 3)) !== 0) ? true : null;
        $video = (($flags & (1 << 6)) !== 0) ? true : null;
        $id = Deserializer::int64($__payload, $__offset);
        $reason = (($flags & (1 << 0)) !== 0) ? AbstractPhoneCallDiscardReason::deserialize($__payload, $__offset) : null;
        $duration = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $id,
            $needRating,
            $needDebug,
            $video,
            $reason,
            $duration
        );
    }
}