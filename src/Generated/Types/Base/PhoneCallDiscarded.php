<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phoneCallDiscarded
 */
final class PhoneCallDiscarded extends AbstractPhoneCall
{
    public const CONSTRUCTOR_ID = 0x50ca4de1;
    
    public string $_ = 'phoneCallDiscarded';
    
    /**
     * @param int $id
     * @param bool|null $needRating
     * @param bool|null $needDebug
     * @param bool|null $video
     * @param AbstractPhoneCallDiscardReason|null $reason
     * @param int|null $duration
     */
    public function __construct(
        public readonly int $id,
        public readonly ?bool $needRating = null,
        public readonly ?bool $needDebug = null,
        public readonly ?bool $video = null,
        public readonly ?AbstractPhoneCallDiscardReason $reason = null,
        public readonly ?int $duration = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->needRating) $flags |= (1 << 2);
        if ($this->needDebug) $flags |= (1 << 3);
        if ($this->video) $flags |= (1 << 6);
        if ($this->reason !== null) $flags |= (1 << 0);
        if ($this->duration !== null) $flags |= (1 << 1);
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $needRating = ($flags & (1 << 2)) ? true : null;
        $needDebug = ($flags & (1 << 3)) ? true : null;
        $video = ($flags & (1 << 6)) ? true : null;
        $id = Deserializer::int64($stream);
        $reason = ($flags & (1 << 0)) ? AbstractPhoneCallDiscardReason::deserialize($stream) : null;
        $duration = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
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