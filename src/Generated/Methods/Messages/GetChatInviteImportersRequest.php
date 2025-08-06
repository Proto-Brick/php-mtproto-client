<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ChatInviteImporters;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getChatInviteImporters
 */
final class GetChatInviteImportersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdf04dd4e;
    
    public string $_ = 'messages.getChatInviteImporters';
    
    public function getMethodName(): string
    {
        return 'messages.getChatInviteImporters';
    }
    
    public function getResponseClass(): string
    {
        return ChatInviteImporters::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $offsetDate
     * @param AbstractInputUser $offsetUser
     * @param int $limit
     * @param bool|null $requested
     * @param bool|null $subscriptionExpired
     * @param string|null $link
     * @param string|null $q
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $offsetDate,
        public readonly AbstractInputUser $offsetUser,
        public readonly int $limit,
        public readonly ?bool $requested = null,
        public readonly ?bool $subscriptionExpired = null,
        public readonly ?string $link = null,
        public readonly ?string $q = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requested) $flags |= (1 << 0);
        if ($this->subscriptionExpired) $flags |= (1 << 3);
        if ($this->link !== null) $flags |= (1 << 1);
        if ($this->q !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->link);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->q);
        }
        $buffer .= $serializer->int32($this->offsetDate);
        $buffer .= $this->offsetUser->serialize($serializer);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}