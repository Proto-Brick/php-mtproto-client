<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/peerNotifySettings
 */
final class PeerNotifySettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x99622c0c;
    
    public string $predicate = 'peerNotifySettings';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->showPreviews !== null) {
            $flags |= (1 << 0);
        }
        if ($this->silent !== null) {
            $flags |= (1 << 1);
        }
        if ($this->muteUntil !== null) {
            $flags |= (1 << 2);
        }
        if ($this->iosSound !== null) {
            $flags |= (1 << 3);
        }
        if ($this->androidSound !== null) {
            $flags |= (1 << 4);
        }
        if ($this->otherSound !== null) {
            $flags |= (1 << 5);
        }
        if ($this->storiesMuted !== null) {
            $flags |= (1 << 6);
        }
        if ($this->storiesHideSender !== null) {
            $flags |= (1 << 7);
        }
        if ($this->storiesIosSound !== null) {
            $flags |= (1 << 8);
        }
        if ($this->storiesAndroidSound !== null) {
            $flags |= (1 << 9);
        }
        if ($this->storiesOtherSound !== null) {
            $flags |= (1 << 10);
        }
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
            $buffer .= $this->iosSound->serialize();
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->androidSound->serialize();
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->otherSound->serialize();
        }
        if ($flags & (1 << 6)) {
            $buffer .= ($this->storiesMuted ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 7)) {
            $buffer .= ($this->storiesHideSender ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->storiesIosSound->serialize();
        }
        if ($flags & (1 << 9)) {
            $buffer .= $this->storiesAndroidSound->serialize();
        }
        if ($flags & (1 << 10)) {
            $buffer .= $this->storiesOtherSound->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $showPreviews = (($flags & (1 << 0)) !== 0) ? (Deserializer::int32($stream) === 0x997275b5) : null;
        $silent = (($flags & (1 << 1)) !== 0) ? (Deserializer::int32($stream) === 0x997275b5) : null;
        $muteUntil = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($stream) : null;
        $iosSound = (($flags & (1 << 3)) !== 0) ? AbstractNotificationSound::deserialize($stream) : null;
        $androidSound = (($flags & (1 << 4)) !== 0) ? AbstractNotificationSound::deserialize($stream) : null;
        $otherSound = (($flags & (1 << 5)) !== 0) ? AbstractNotificationSound::deserialize($stream) : null;
        $storiesMuted = (($flags & (1 << 6)) !== 0) ? (Deserializer::int32($stream) === 0x997275b5) : null;
        $storiesHideSender = (($flags & (1 << 7)) !== 0) ? (Deserializer::int32($stream) === 0x997275b5) : null;
        $storiesIosSound = (($flags & (1 << 8)) !== 0) ? AbstractNotificationSound::deserialize($stream) : null;
        $storiesAndroidSound = (($flags & (1 << 9)) !== 0) ? AbstractNotificationSound::deserialize($stream) : null;
        $storiesOtherSound = (($flags & (1 << 10)) !== 0) ? AbstractNotificationSound::deserialize($stream) : null;

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