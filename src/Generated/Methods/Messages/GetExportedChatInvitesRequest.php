<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractExportedChatInvites;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getExportedChatInvites
 */
final class GetExportedChatInvitesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2729812982;
    
    public string $_ = 'messages.getExportedChatInvites';
    
    public function getMethodName(): string
    {
        return 'messages.getExportedChatInvites';
    }
    
    public function getResponseClass(): string
    {
        return AbstractExportedChatInvites::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputUser $adminId
     * @param int $limit
     * @param bool|null $revoked
     * @param int|null $offsetDate
     * @param string|null $offsetLink
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputUser $adminId,
        public readonly int $limit,
        public readonly ?bool $revoked = null,
        public readonly ?int $offsetDate = null,
        public readonly ?string $offsetLink = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoked) $flags |= (1 << 3);
        if ($this->offsetDate !== null) $flags |= (1 << 2);
        if ($this->offsetLink !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->adminId->serialize($serializer);
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->offsetDate);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->offsetLink);
        }
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}