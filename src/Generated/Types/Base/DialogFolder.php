<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/dialogFolder
 */
final class DialogFolder extends AbstractDialog
{
    public const CONSTRUCTOR_ID = 1908216652;
    
    public string $_ = 'dialogFolder';
    
    /**
     * @param AbstractFolder $folder
     * @param AbstractPeer $peer
     * @param int $topMessage
     * @param int $unreadMutedPeersCount
     * @param int $unreadUnmutedPeersCount
     * @param int $unreadMutedMessagesCount
     * @param int $unreadUnmutedMessagesCount
     * @param bool|null $pinned
     */
    public function __construct(
        public readonly AbstractFolder $folder,
        public readonly AbstractPeer $peer,
        public readonly int $topMessage,
        public readonly int $unreadMutedPeersCount,
        public readonly int $unreadUnmutedPeersCount,
        public readonly int $unreadMutedMessagesCount,
        public readonly int $unreadUnmutedMessagesCount,
        public readonly ?bool $pinned = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->folder->serialize($serializer);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->topMessage);
        $buffer .= $serializer->int32($this->unreadMutedPeersCount);
        $buffer .= $serializer->int32($this->unreadUnmutedPeersCount);
        $buffer .= $serializer->int32($this->unreadMutedMessagesCount);
        $buffer .= $serializer->int32($this->unreadUnmutedMessagesCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $pinned = ($flags & (1 << 2)) ? true : null;
        $folder = AbstractFolder::deserialize($deserializer, $stream);
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $topMessage = $deserializer->int32($stream);
        $unreadMutedPeersCount = $deserializer->int32($stream);
        $unreadUnmutedPeersCount = $deserializer->int32($stream);
        $unreadMutedMessagesCount = $deserializer->int32($stream);
        $unreadUnmutedMessagesCount = $deserializer->int32($stream);
            return new self(
            $folder,
            $peer,
            $topMessage,
            $unreadMutedPeersCount,
            $unreadUnmutedPeersCount,
            $unreadMutedMessagesCount,
            $unreadUnmutedMessagesCount,
            $pinned
        );
    }
}