<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starsSubscription
 */
final class StarsSubscription extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2e6eab1a;
    
    public string $_ = 'starsSubscription';
    
    /**
     * @param string $id
     * @param AbstractPeer $peer
     * @param int $untilDate
     * @param StarsSubscriptionPricing $pricing
     * @param bool|null $canceled
     * @param bool|null $canRefulfill
     * @param bool|null $missingBalance
     * @param bool|null $botCanceled
     * @param string|null $chatInviteHash
     * @param string|null $title
     * @param AbstractWebDocument|null $photo
     * @param string|null $invoiceSlug
     */
    public function __construct(
        public readonly string $id,
        public readonly AbstractPeer $peer,
        public readonly int $untilDate,
        public readonly StarsSubscriptionPricing $pricing,
        public readonly ?bool $canceled = null,
        public readonly ?bool $canRefulfill = null,
        public readonly ?bool $missingBalance = null,
        public readonly ?bool $botCanceled = null,
        public readonly ?string $chatInviteHash = null,
        public readonly ?string $title = null,
        public readonly ?AbstractWebDocument $photo = null,
        public readonly ?string $invoiceSlug = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canceled) $flags |= (1 << 0);
        if ($this->canRefulfill) $flags |= (1 << 1);
        if ($this->missingBalance) $flags |= (1 << 2);
        if ($this->botCanceled) $flags |= (1 << 7);
        if ($this->chatInviteHash !== null) $flags |= (1 << 3);
        if ($this->title !== null) $flags |= (1 << 4);
        if ($this->photo !== null) $flags |= (1 << 5);
        if ($this->invoiceSlug !== null) $flags |= (1 << 6);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->id);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->untilDate);
        $buffer .= $this->pricing->serialize($serializer);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->chatInviteHash);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->bytes($this->title);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->bytes($this->invoiceSlug);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $canceled = ($flags & (1 << 0)) ? true : null;
        $canRefulfill = ($flags & (1 << 1)) ? true : null;
        $missingBalance = ($flags & (1 << 2)) ? true : null;
        $botCanceled = ($flags & (1 << 7)) ? true : null;
        $id = $deserializer->bytes($stream);
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $untilDate = $deserializer->int32($stream);
        $pricing = StarsSubscriptionPricing::deserialize($deserializer, $stream);
        $chatInviteHash = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        $title = ($flags & (1 << 4)) ? $deserializer->bytes($stream) : null;
        $photo = ($flags & (1 << 5)) ? AbstractWebDocument::deserialize($deserializer, $stream) : null;
        $invoiceSlug = ($flags & (1 << 6)) ? $deserializer->bytes($stream) : null;
        return new self(
            $id,
            $peer,
            $untilDate,
            $pricing,
            $canceled,
            $canRefulfill,
            $missingBalance,
            $botCanceled,
            $chatInviteHash,
            $title,
            $photo,
            $invoiceSlug
        );
    }
}