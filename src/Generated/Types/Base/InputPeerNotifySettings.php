<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPeerNotifySettings
 */
final class InputPeerNotifySettings extends AbstractInputPeerNotifySettings
{
    public const CONSTRUCTOR_ID = 3402328802;
    
    public string $_ = 'inputPeerNotifySettings';
    
    /**
     * @param bool|null $showPreviews
     * @param bool|null $silent
     * @param int|null $muteUntil
     * @param AbstractNotificationSound|null $sound
     * @param bool|null $storiesMuted
     * @param bool|null $storiesHideSender
     * @param AbstractNotificationSound|null $storiesSound
     */
    public function __construct(
        public readonly ?bool $showPreviews = null,
        public readonly ?bool $silent = null,
        public readonly ?int $muteUntil = null,
        public readonly ?AbstractNotificationSound $sound = null,
        public readonly ?bool $storiesMuted = null,
        public readonly ?bool $storiesHideSender = null,
        public readonly ?AbstractNotificationSound $storiesSound = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->showPreviews !== null) $flags |= (1 << 0);
        if ($this->silent !== null) $flags |= (1 << 1);
        if ($this->muteUntil !== null) $flags |= (1 << 2);
        if ($this->sound !== null) $flags |= (1 << 3);
        if ($this->storiesMuted !== null) $flags |= (1 << 6);
        if ($this->storiesHideSender !== null) $flags |= (1 << 7);
        if ($this->storiesSound !== null) $flags |= (1 << 8);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= ($this->showPreviews ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 1)) {
            $buffer .= ($this->silent ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->muteUntil);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->sound->serialize($serializer);
        }
        if ($flags & (1 << 6)) {
            $buffer .= ($this->storiesMuted ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 7)) {
            $buffer .= ($this->storiesHideSender ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->storiesSound->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $showPreviews = ($flags & (1 << 0)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $silent = ($flags & (1 << 1)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $muteUntil = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        $sound = ($flags & (1 << 3)) ? AbstractNotificationSound::deserialize($deserializer, $stream) : null;
        $storiesMuted = ($flags & (1 << 6)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $storiesHideSender = ($flags & (1 << 7)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $storiesSound = ($flags & (1 << 8)) ? AbstractNotificationSound::deserialize($deserializer, $stream) : null;
            return new self(
            $showPreviews,
            $silent,
            $muteUntil,
            $sound,
            $storiesMuted,
            $storiesHideSender,
            $storiesSound
        );
    }
}