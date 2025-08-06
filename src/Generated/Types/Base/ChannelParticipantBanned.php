<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelParticipantBanned
 */
final class ChannelParticipantBanned extends AbstractChannelParticipant
{
    public const CONSTRUCTOR_ID = 0x6df8014e;
    
    public string $_ = 'channelParticipantBanned';
    
    /**
     * @param AbstractPeer $peer
     * @param int $kickedBy
     * @param int $date
     * @param ChatBannedRights $bannedRights
     * @param bool|null $left
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $kickedBy,
        public readonly int $date,
        public readonly ChatBannedRights $bannedRights,
        public readonly ?bool $left = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->left) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int64($this->kickedBy);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $this->bannedRights->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $left = ($flags & (1 << 0)) ? true : null;
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $kickedBy = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $bannedRights = ChatBannedRights::deserialize($deserializer, $stream);
        return new self(
            $peer,
            $kickedBy,
            $date,
            $bannedRights,
            $left
        );
    }
}