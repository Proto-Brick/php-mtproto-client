<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/peerNotifySettings
 */
final class PeerNotifySettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x99622c0c;
    
    public string $_ = 'peerNotifySettings';
    
    /**
     * @param bool|null $showPreviews
     * @param bool|null $silent
     * @param int|null $muteUntil
     * @param AbstractNotificationSound|null $iosSound
     * @param AbstractNotificationSound|null $androidSound
     * @param AbstractNotificationSound|null $otherSound
     * @param bool|null $storiesMuted
     * @param bool|null $storiesHideSender
     * @param AbstractNotificationSound|null $storiesIosSound
     * @param AbstractNotificationSound|null $storiesAndroidSound
     * @param AbstractNotificationSound|null $storiesOtherSound
     */
    public function __construct(
        public readonly ?bool $showPreviews = null,
        public readonly ?bool $silent = null,
        public readonly ?int $muteUntil = null,
        public readonly ?AbstractNotificationSound $iosSound = null,
        public readonly ?AbstractNotificationSound $androidSound = null,
        public readonly ?AbstractNotificationSound $otherSound = null,
        public readonly ?bool $storiesMuted = null,
        public readonly ?bool $storiesHideSender = null,
        public readonly ?AbstractNotificationSound $storiesIosSound = null,
        public readonly ?AbstractNotificationSound $storiesAndroidSound = null,
        public readonly ?AbstractNotificationSound $storiesOtherSound = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->showPreviews !== null) $flags |= (1 << 0);
        if ($this->silent !== null) $flags |= (1 << 1);
        if ($this->muteUntil !== null) $flags |= (1 << 2);
        if ($this->iosSound !== null) $flags |= (1 << 3);
        if ($this->androidSound !== null) $flags |= (1 << 4);
        if ($this->otherSound !== null) $flags |= (1 << 5);
        if ($this->storiesMuted !== null) $flags |= (1 << 6);
        if ($this->storiesHideSender !== null) $flags |= (1 << 7);
        if ($this->storiesIosSound !== null) $flags |= (1 << 8);
        if ($this->storiesAndroidSound !== null) $flags |= (1 << 9);
        if ($this->storiesOtherSound !== null) $flags |= (1 << 10);
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
            $buffer .= $this->iosSound->serialize($serializer);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->androidSound->serialize($serializer);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->otherSound->serialize($serializer);
        }
        if ($flags & (1 << 6)) {
            $buffer .= ($this->storiesMuted ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 7)) {
            $buffer .= ($this->storiesHideSender ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->storiesIosSound->serialize($serializer);
        }
        if ($flags & (1 << 9)) {
            $buffer .= $this->storiesAndroidSound->serialize($serializer);
        }
        if ($flags & (1 << 10)) {
            $buffer .= $this->storiesOtherSound->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $showPreviews = ($flags & (1 << 0)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $silent = ($flags & (1 << 1)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $muteUntil = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        $iosSound = ($flags & (1 << 3)) ? AbstractNotificationSound::deserialize($deserializer, $stream) : null;
        $androidSound = ($flags & (1 << 4)) ? AbstractNotificationSound::deserialize($deserializer, $stream) : null;
        $otherSound = ($flags & (1 << 5)) ? AbstractNotificationSound::deserialize($deserializer, $stream) : null;
        $storiesMuted = ($flags & (1 << 6)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $storiesHideSender = ($flags & (1 << 7)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $storiesIosSound = ($flags & (1 << 8)) ? AbstractNotificationSound::deserialize($deserializer, $stream) : null;
        $storiesAndroidSound = ($flags & (1 << 9)) ? AbstractNotificationSound::deserialize($deserializer, $stream) : null;
        $storiesOtherSound = ($flags & (1 << 10)) ? AbstractNotificationSound::deserialize($deserializer, $stream) : null;
        return new self(
            $showPreviews,
            $silent,
            $muteUntil,
            $iosSound,
            $androidSound,
            $otherSound,
            $storiesMuted,
            $storiesHideSender,
            $storiesIosSound,
            $storiesAndroidSound,
            $storiesOtherSound
        );
    }
}