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
    public const CONSTRUCTOR_ID = 0x71bd134c;
    
    public string $predicate = 'dialogFolder';
    
    /**
     * @param Folder $folder
     * @param AbstractPeer $peer
     * @param int $topMessage
     * @param int $unreadMutedPeersCount
     * @param int $unreadUnmutedPeersCount
     * @param int $unreadMutedMessagesCount
     * @param int $unreadUnmutedMessagesCount
     * @param true|null $pinned
     */
    public function __construct(
        public readonly Folder $folder,
        public readonly AbstractPeer $peer,
        public readonly int $topMessage,
        public readonly int $unreadMutedPeersCount,
        public readonly int $unreadUnmutedPeersCount,
        public readonly int $unreadMutedMessagesCount,
        public readonly int $unreadUnmutedMessagesCount,
        public readonly ?true $pinned = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->folder->serialize();
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->topMessage);
        $buffer .= Serializer::int32($this->unreadMutedPeersCount);
        $buffer .= Serializer::int32($this->unreadUnmutedPeersCount);
        $buffer .= Serializer::int32($this->unreadMutedMessagesCount);
        $buffer .= Serializer::int32($this->unreadUnmutedMessagesCount);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $pinned = ($flags & (1 << 2)) ? true : null;
        $folder = Folder::deserialize($stream);
        $peer = AbstractPeer::deserialize($stream);
        $topMessage = Deserializer::int32($stream);
        $unreadMutedPeersCount = Deserializer::int32($stream);
        $unreadUnmutedPeersCount = Deserializer::int32($stream);
        $unreadMutedMessagesCount = Deserializer::int32($stream);
        $unreadUnmutedMessagesCount = Deserializer::int32($stream);

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