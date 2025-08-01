<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/reactionsNotifySettings
 */
final class ReactionsNotifySettings extends AbstractReactionsNotifySettings
{
    public const CONSTRUCTOR_ID = 1457736048;
    
    public string $_ = 'reactionsNotifySettings';
    
    /**
     * @param AbstractNotificationSound $sound
     * @param bool $showPreviews
     * @param AbstractReactionNotificationsFrom|null $messagesNotifyFrom
     * @param AbstractReactionNotificationsFrom|null $storiesNotifyFrom
     */
    public function __construct(
        public readonly AbstractNotificationSound $sound,
        public readonly bool $showPreviews,
        public readonly ?AbstractReactionNotificationsFrom $messagesNotifyFrom = null,
        public readonly ?AbstractReactionNotificationsFrom $storiesNotifyFrom = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->messagesNotifyFrom !== null) $flags |= (1 << 0);
        if ($this->storiesNotifyFrom !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->messagesNotifyFrom->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->storiesNotifyFrom->serialize($serializer);
        }
        $buffer .= $this->sound->serialize($serializer);
        $buffer .= ($this->showPreviews ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $messagesNotifyFrom = ($flags & (1 << 0)) ? AbstractReactionNotificationsFrom::deserialize($deserializer, $stream) : null;
        $storiesNotifyFrom = ($flags & (1 << 1)) ? AbstractReactionNotificationsFrom::deserialize($deserializer, $stream) : null;
        $sound = AbstractNotificationSound::deserialize($deserializer, $stream);
        $showPreviews = ($deserializer->int32($stream) === 0x997275b5);
            return new self(
            $sound,
            $showPreviews,
            $messagesNotifyFrom,
            $storiesNotifyFrom
        );
    }
}