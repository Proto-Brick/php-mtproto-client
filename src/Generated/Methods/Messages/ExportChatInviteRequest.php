<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractExportedChatInvite;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarsSubscriptionPricing;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.exportChatInvite
 */
final class ExportChatInviteRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa455de90;
    
    public string $predicate = 'messages.exportChatInvite';
    
    public function getMethodName(): string
    {
        return 'messages.exportChatInvite';
    }
    
    public function getResponseClass(): string
    {
        return AbstractExportedChatInvite::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param true|null $legacyRevokePermanent
     * @param true|null $requestNeeded
     * @param int|null $expireDate
     * @param int|null $usageLimit
     * @param string|null $title
     * @param StarsSubscriptionPricing|null $subscriptionPricing
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?true $legacyRevokePermanent = null,
        public readonly ?true $requestNeeded = null,
        public readonly ?int $expireDate = null,
        public readonly ?int $usageLimit = null,
        public readonly ?string $title = null,
        public readonly ?StarsSubscriptionPricing $subscriptionPricing = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->legacyRevokePermanent) $flags |= (1 << 2);
        if ($this->requestNeeded) $flags |= (1 << 3);
        if ($this->expireDate !== null) $flags |= (1 << 0);
        if ($this->usageLimit !== null) $flags |= (1 << 1);
        if ($this->title !== null) $flags |= (1 << 4);
        if ($this->subscriptionPricing !== null) $flags |= (1 << 5);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->expireDate);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->usageLimit);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->subscriptionPricing->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}