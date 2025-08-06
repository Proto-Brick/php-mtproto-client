<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatInvite
 */
final class ChatInvite extends AbstractChatInvite
{
    public const CONSTRUCTOR_ID = 0xfe65389d;
    
    public string $_ = 'chatInvite';
    
    /**
     * @param string $title
     * @param AbstractPhoto $photo
     * @param int $participantsCount
     * @param int $color
     * @param bool|null $channel
     * @param bool|null $broadcast
     * @param bool|null $public
     * @param bool|null $megagroup
     * @param bool|null $requestNeeded
     * @param bool|null $verified
     * @param bool|null $scam
     * @param bool|null $fake
     * @param bool|null $canRefulfillSubscription
     * @param string|null $about
     * @param list<AbstractUser>|null $participants
     * @param StarsSubscriptionPricing|null $subscriptionPricing
     * @param int|null $subscriptionFormId
     */
    public function __construct(
        public readonly string $title,
        public readonly AbstractPhoto $photo,
        public readonly int $participantsCount,
        public readonly int $color,
        public readonly ?bool $channel = null,
        public readonly ?bool $broadcast = null,
        public readonly ?bool $public = null,
        public readonly ?bool $megagroup = null,
        public readonly ?bool $requestNeeded = null,
        public readonly ?bool $verified = null,
        public readonly ?bool $scam = null,
        public readonly ?bool $fake = null,
        public readonly ?bool $canRefulfillSubscription = null,
        public readonly ?string $about = null,
        public readonly ?array $participants = null,
        public readonly ?StarsSubscriptionPricing $subscriptionPricing = null,
        public readonly ?int $subscriptionFormId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->channel) $flags |= (1 << 0);
        if ($this->broadcast) $flags |= (1 << 1);
        if ($this->public) $flags |= (1 << 2);
        if ($this->megagroup) $flags |= (1 << 3);
        if ($this->requestNeeded) $flags |= (1 << 6);
        if ($this->verified) $flags |= (1 << 7);
        if ($this->scam) $flags |= (1 << 8);
        if ($this->fake) $flags |= (1 << 9);
        if ($this->canRefulfillSubscription) $flags |= (1 << 11);
        if ($this->about !== null) $flags |= (1 << 5);
        if ($this->participants !== null) $flags |= (1 << 4);
        if ($this->subscriptionPricing !== null) $flags |= (1 << 10);
        if ($this->subscriptionFormId !== null) $flags |= (1 << 12);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->title);
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->bytes($this->about);
        }
        $buffer .= $this->photo->serialize($serializer);
        $buffer .= $serializer->int32($this->participantsCount);
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->vectorOfObjects($this->participants);
        }
        $buffer .= $serializer->int32($this->color);
        if ($flags & (1 << 10)) {
            $buffer .= $this->subscriptionPricing->serialize($serializer);
        }
        if ($flags & (1 << 12)) {
            $buffer .= $serializer->int64($this->subscriptionFormId);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $channel = ($flags & (1 << 0)) ? true : null;
        $broadcast = ($flags & (1 << 1)) ? true : null;
        $public = ($flags & (1 << 2)) ? true : null;
        $megagroup = ($flags & (1 << 3)) ? true : null;
        $requestNeeded = ($flags & (1 << 6)) ? true : null;
        $verified = ($flags & (1 << 7)) ? true : null;
        $scam = ($flags & (1 << 8)) ? true : null;
        $fake = ($flags & (1 << 9)) ? true : null;
        $canRefulfillSubscription = ($flags & (1 << 11)) ? true : null;
        $title = $deserializer->bytes($stream);
        $about = ($flags & (1 << 5)) ? $deserializer->bytes($stream) : null;
        $photo = AbstractPhoto::deserialize($deserializer, $stream);
        $participantsCount = $deserializer->int32($stream);
        $participants = ($flags & (1 << 4)) ? $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']) : null;
        $color = $deserializer->int32($stream);
        $subscriptionPricing = ($flags & (1 << 10)) ? StarsSubscriptionPricing::deserialize($deserializer, $stream) : null;
        $subscriptionFormId = ($flags & (1 << 12)) ? $deserializer->int64($stream) : null;
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
            $subscriptionFormId
        );
    }
}