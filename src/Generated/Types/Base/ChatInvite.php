<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatInvite
 */
final class ChatInvite extends AbstractChatInvite
{
    public const CONSTRUCTOR_ID = 0x5c9d3702;
    
    public string $predicate = 'chatInvite';
    
    /**
     * @param string $title
     * @param AbstractPhoto $photo
     * @param int $participantsCount
     * @param int $color
     * @param true|null $channel
     * @param true|null $broadcast
     * @param true|null $public
     * @param true|null $megagroup
     * @param true|null $requestNeeded
     * @param true|null $verified
     * @param true|null $scam
     * @param true|null $fake
     * @param true|null $canRefulfillSubscription
     * @param string|null $about
     * @param list<AbstractUser>|null $participants
     * @param StarsSubscriptionPricing|null $subscriptionPricing
     * @param int|null $subscriptionFormId
     * @param BotVerification|null $botVerification
     */
    public function __construct(
        public readonly string $title,
        public readonly AbstractPhoto $photo,
        public readonly int $participantsCount,
        public readonly int $color,
        public readonly ?true $channel = null,
        public readonly ?true $broadcast = null,
        public readonly ?true $public = null,
        public readonly ?true $megagroup = null,
        public readonly ?true $requestNeeded = null,
        public readonly ?true $verified = null,
        public readonly ?true $scam = null,
        public readonly ?true $fake = null,
        public readonly ?true $canRefulfillSubscription = null,
        public readonly ?string $about = null,
        public readonly ?array $participants = null,
        public readonly ?StarsSubscriptionPricing $subscriptionPricing = null,
        public readonly ?int $subscriptionFormId = null,
        public readonly ?BotVerification $botVerification = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->channel) {
            $flags |= (1 << 0);
        }
        if ($this->broadcast) {
            $flags |= (1 << 1);
        }
        if ($this->public) {
            $flags |= (1 << 2);
        }
        if ($this->megagroup) {
            $flags |= (1 << 3);
        }
        if ($this->requestNeeded) {
            $flags |= (1 << 6);
        }
        if ($this->verified) {
            $flags |= (1 << 7);
        }
        if ($this->scam) {
            $flags |= (1 << 8);
        }
        if ($this->fake) {
            $flags |= (1 << 9);
        }
        if ($this->canRefulfillSubscription) {
            $flags |= (1 << 11);
        }
        if ($this->about !== null) {
            $flags |= (1 << 5);
        }
        if ($this->participants !== null) {
            $flags |= (1 << 4);
        }
        if ($this->subscriptionPricing !== null) {
            $flags |= (1 << 10);
        }
        if ($this->subscriptionFormId !== null) {
            $flags |= (1 << 12);
        }
        if ($this->botVerification !== null) {
            $flags |= (1 << 13);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::bytes($this->about);
        }
        $buffer .= $this->photo->serialize();
        $buffer .= Serializer::int32($this->participantsCount);
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::vectorOfObjects($this->participants);
        }
        $buffer .= Serializer::int32($this->color);
        if ($flags & (1 << 10)) {
            $buffer .= $this->subscriptionPricing->serialize();
        }
        if ($flags & (1 << 12)) {
            $buffer .= Serializer::int64($this->subscriptionFormId);
        }
        if ($flags & (1 << 13)) {
            $buffer .= $this->botVerification->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $channel = (($flags & (1 << 0)) !== 0) ? true : null;
        $broadcast = (($flags & (1 << 1)) !== 0) ? true : null;
        $public = (($flags & (1 << 2)) !== 0) ? true : null;
        $megagroup = (($flags & (1 << 3)) !== 0) ? true : null;
        $requestNeeded = (($flags & (1 << 6)) !== 0) ? true : null;
        $verified = (($flags & (1 << 7)) !== 0) ? true : null;
        $scam = (($flags & (1 << 8)) !== 0) ? true : null;
        $fake = (($flags & (1 << 9)) !== 0) ? true : null;
        $canRefulfillSubscription = (($flags & (1 << 11)) !== 0) ? true : null;
        $title = Deserializer::bytes($__payload, $__offset);
        $about = (($flags & (1 << 5)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $photo = AbstractPhoto::deserialize($__payload, $__offset);
        $participantsCount = Deserializer::int32($__payload, $__offset);
        $participants = (($flags & (1 << 4)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']) : null;
        $color = Deserializer::int32($__payload, $__offset);
        $subscriptionPricing = (($flags & (1 << 10)) !== 0) ? StarsSubscriptionPricing::deserialize($__payload, $__offset) : null;
        $subscriptionFormId = (($flags & (1 << 12)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $botVerification = (($flags & (1 << 13)) !== 0) ? BotVerification::deserialize($__payload, $__offset) : null;

        return new self(
            $title,
            $photo,
            $participantsCount,
            $color,
            $channel,
            $broadcast,
            $public,
            $megagroup,
            $requestNeeded,
            $verified,
            $scam,
            $fake,
            $canRefulfillSubscription,
            $about,
            $participants,
            $subscriptionPricing,
            $subscriptionFormId,
            $botVerification
        );
    }
}