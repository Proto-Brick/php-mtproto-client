<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateReadHistoryInbox
 */
final class UpdateReadHistoryInbox extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x9c974fdf;
    
    public string $_ = 'updateReadHistoryInbox';
    
    /**
     * @param AbstractPeer $peer
     * @param int $maxId
     * @param int $stillUnreadCount
     * @param int $pts
     * @param int $ptsCount
     * @param int|null $folderId
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $maxId,
        public readonly int $stillUnreadCount,
        public readonly int $pts,
        public readonly int $ptsCount,
        public readonly ?int $folderId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->folderId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->folderId);
        }
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->maxId);
        $buffer .= $serializer->int32($this->stillUnreadCount);
        $buffer .= $serializer->int32($this->pts);
        $buffer .= $serializer->int32($this->ptsCount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $folderId = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $maxId = $deserializer->int32($stream);
        $stillUnreadCount = $deserializer->int32($stream);
        $pts = $deserializer->int32($stream);
        $ptsCount = $deserializer->int32($stream);
        return new self(
            $peer,
            $maxId,
            $stillUnreadCount,
            $pts,
            $ptsCount,
            $folderId
        );
    }
}