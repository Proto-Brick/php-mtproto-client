<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractExportedChatInvite;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.editExportedChatInvite
 */
final class EditExportedChatInviteRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3184144245;
    
    public string $_ = 'messages.editExportedChatInvite';
    
    public function getMethodName(): string
    {
        return 'messages.editExportedChatInvite';
    }
    
    public function getResponseClass(): string
    {
        return AbstractExportedChatInvite::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $link
     * @param bool|null $revoked
     * @param int|null $expireDate
     * @param int|null $usageLimit
     * @param bool|null $requestNeeded
     * @param string|null $title
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $link,
        public readonly ?bool $revoked = null,
        public readonly ?int $expireDate = null,
        public readonly ?int $usageLimit = null,
        public readonly ?bool $requestNeeded = null,
        public readonly ?string $title = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->revoked) $flags |= (1 << 2);
        if ($this->expireDate !== null) $flags |= (1 << 0);
        if ($this->usageLimit !== null) $flags |= (1 << 1);
        if ($this->requestNeeded !== null) $flags |= (1 << 3);
        if ($this->title !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->link);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->expireDate);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->usageLimit);
        }
        if ($flags & (1 << 3)) {
            $buffer .= ($this->requestNeeded ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->bytes($this->title);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}