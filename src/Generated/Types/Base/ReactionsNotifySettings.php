<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/reactionsNotifySettings
 */
final class ReactionsNotifySettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x56e34970;
    
    public string $predicate = 'reactionsNotifySettings';
    
    /**
     * @param AbstractNotificationSound $sound
     * @param bool $showPreviews
     * @param ReactionNotificationsFrom|null $messagesNotifyFrom
     * @param ReactionNotificationsFrom|null $storiesNotifyFrom
     */
    public function __construct(
        public readonly AbstractNotificationSound $sound,
        public readonly bool $showPreviews,
        public readonly ?ReactionNotificationsFrom $messagesNotifyFrom = null,
        public readonly ?ReactionNotificationsFrom $storiesNotifyFrom = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->messagesNotifyFrom !== null) $flags |= (1 << 0);
        if ($this->storiesNotifyFrom !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->messagesNotifyFrom->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->storiesNotifyFrom->serialize();
        }
        $buffer .= $this->sound->serialize();
        $buffer .= ($this->showPreviews ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $messagesNotifyFrom = ($flags & (1 << 0)) ? ReactionNotificationsFrom::deserialize($stream) : null;
        $storiesNotifyFrom = ($flags & (1 << 1)) ? ReactionNotificationsFrom::deserialize($stream) : null;
        $sound = AbstractNotificationSound::deserialize($stream);
        $showPreviews = (Deserializer::int32($stream) === 0x997275b5);

        return new self(
            $sound,
            $showPreviews,
            $messagesNotifyFrom,
            $storiesNotifyFrom
        );
    }
}