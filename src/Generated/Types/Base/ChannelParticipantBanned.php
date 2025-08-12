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
    
    public string $predicate = 'channelParticipantBanned';
    
    /**
     * @param AbstractPeer $peer
     * @param int $kickedBy
     * @param int $date
     * @param ChatBannedRights $bannedRights
     * @param true|null $left
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $kickedBy,
        public readonly int $date,
        public readonly ChatBannedRights $bannedRights,
        public readonly ?true $left = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->left) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->kickedBy);
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->bannedRights->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $left = ($flags & (1 << 0)) ? true : null;
        $peer = AbstractPeer::deserialize($stream);
        $kickedBy = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $bannedRights = ChatBannedRights::deserialize($stream);

        return new self(
            $peer,
            $kickedBy,
            $date,
            $bannedRights,
            $left
        );
    }
}