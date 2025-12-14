<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
        if ($this->messagesNotifyFrom !== null) {
            $flags |= (1 << 0);
        }
        if ($this->storiesNotifyFrom !== null) {
            $flags |= (1 << 1);
        }
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
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $messagesNotifyFrom = (($flags & (1 << 0)) !== 0) ? ReactionNotificationsFrom::deserialize($stream) : null;
        $storiesNotifyFrom = (($flags & (1 << 1)) !== 0) ? ReactionNotificationsFrom::deserialize($stream) : null;
        $sound = AbstractNotificationSound::deserialize($stream);
        $showPreviews = (unpack('V', substr($stream, 0, 4))[1] === 0x997275b5);
        $stream = substr($stream, 4);

        return new self(
            $sound,
            $showPreviews,
            $messagesNotifyFrom,
            $storiesNotifyFrom
        );
    }
}