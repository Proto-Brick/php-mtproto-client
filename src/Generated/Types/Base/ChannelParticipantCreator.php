<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelParticipantCreator
 */
final class ChannelParticipantCreator extends AbstractChannelParticipant
{
    public const CONSTRUCTOR_ID = 0x2fe601d3;
    
    public string $_ = 'channelParticipantCreator';
    
    /**
     * @param int $userId
     * @param ChatAdminRights $adminRights
     * @param string|null $rank
     */
    public function __construct(
        public readonly int $userId,
        public readonly ChatAdminRights $adminRights,
        public readonly ?string $rank = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->rank !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->userId);
        $buffer .= $this->adminRights->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->rank);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $userId = $deserializer->int64($stream);
        $adminRights = ChatAdminRights::deserialize($deserializer, $stream);
        $rank = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        return new self(
            $userId,
            $adminRights,
            $rank
        );
    }
}