<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/requestPeerTypeChat
 */
final class RequestPeerTypeChat extends AbstractRequestPeerType
{
    public const CONSTRUCTOR_ID = 3387977243;
    
    public string $_ = 'requestPeerTypeChat';
    
    /**
     * @param bool|null $creator
     * @param bool|null $botParticipant
     * @param bool|null $hasUsername
     * @param bool|null $forum
     * @param AbstractChatAdminRights|null $userAdminRights
     * @param AbstractChatAdminRights|null $botAdminRights
     */
    public function __construct(
        public readonly ?bool $creator = null,
        public readonly ?bool $botParticipant = null,
        public readonly ?bool $hasUsername = null,
        public readonly ?bool $forum = null,
        public readonly ?AbstractChatAdminRights $userAdminRights = null,
        public readonly ?AbstractChatAdminRights $botAdminRights = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->creator) $flags |= (1 << 0);
        if ($this->botParticipant) $flags |= (1 << 5);
        if ($this->hasUsername !== null) $flags |= (1 << 3);
        if ($this->forum !== null) $flags |= (1 << 4);
        if ($this->userAdminRights !== null) $flags |= (1 << 1);
        if ($this->botAdminRights !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 3)) {
            $buffer .= ($this->hasUsername ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 4)) {
            $buffer .= ($this->forum ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->userAdminRights->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->botAdminRights->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $creator = ($flags & (1 << 0)) ? true : null;
        $botParticipant = ($flags & (1 << 5)) ? true : null;
        $hasUsername = ($flags & (1 << 3)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $forum = ($flags & (1 << 4)) ? ($deserializer->int32($stream) === 0x997275b5) : null;
        $userAdminRights = ($flags & (1 << 1)) ? AbstractChatAdminRights::deserialize($deserializer, $stream) : null;
        $botAdminRights = ($flags & (1 << 2)) ? AbstractChatAdminRights::deserialize($deserializer, $stream) : null;
            return new self(
            $creator,
            $botParticipant,
            $hasUsername,
            $forum,
            $userAdminRights,
            $botAdminRights
        );
    }
}