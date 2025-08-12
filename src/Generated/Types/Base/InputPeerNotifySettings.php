<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPeerNotifySettings
 */
final class InputPeerNotifySettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcacb6ae2;
    
    public string $predicate = 'inputPeerNotifySettings';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->showPreviews !== null) $flags |= (1 << 0);
        if ($this->silent !== null) $flags |= (1 << 1);
        if ($this->muteUntil !== null) $flags |= (1 << 2);
        if ($this->sound !== null) $flags |= (1 << 3);
        if ($this->storiesMuted !== null) $flags |= (1 << 6);
        if ($this->storiesHideSender !== null) $flags |= (1 << 7);
        if ($this->storiesSound !== null) $flags |= (1 << 8);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= ($this->showPreviews ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 1)) {
            $buffer .= ($this->silent ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->muteUntil);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->sound->serialize();
        }
        if ($flags & (1 << 6)) {
            $buffer .= ($this->storiesMuted ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 7)) {
            $buffer .= ($this->storiesHideSender ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->storiesSound->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $showPreviews = ($flags & (1 << 0)) ? (Deserializer::int32($stream) === 0x997275b5) : null;
        $silent = ($flags & (1 << 1)) ? (Deserializer::int32($stream) === 0x997275b5) : null;
        $muteUntil = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
        $sound = ($flags & (1 << 3)) ? AbstractNotificationSound::deserialize($stream) : null;
        $storiesMuted = ($flags & (1 << 6)) ? (Deserializer::int32($stream) === 0x997275b5) : null;
        $storiesHideSender = ($flags & (1 << 7)) ? (Deserializer::int32($stream) === 0x997275b5) : null;
        $storiesSound = ($flags & (1 << 8)) ? AbstractNotificationSound::deserialize($stream) : null;

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