<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starsTransaction
 */
final class StarsTransaction extends TlObject
{
    public const CONSTRUCTOR_ID = 0x64dfc926;
    
    public string $_ = 'starsTransaction';
    
    /**
     * @param string $id
     * @param StarsAmount $stars
     * @param int $date
     * @param AbstractStarsTransactionPeer $peer
     * @param bool|null $refund
     * @param bool|null $pending
     * @param bool|null $failed
     * @param bool|null $gift
     * @param bool|null $reaction
     * @param string|null $title
     * @param string|null $description
     * @param AbstractWebDocument|null $photo
     * @param int|null $transactionDate
     * @param string|null $transactionUrl
     * @param string|null $botPayload
     * @param int|null $msgId
     * @param list<AbstractMessageMedia>|null $extendedMedia
     * @param int|null $subscriptionPeriod
     * @param int|null $giveawayPostId
     * @param StarGift|null $stargift
     * @param int|null $floodskipNumber
     * @param int|null $starrefCommissionPermille
     * @param AbstractPeer|null $starrefPeer
     * @param StarsAmount|null $starrefAmount
     */
    public function __construct(
        public readonly string $id,
        public readonly StarsAmount $stars,
        public readonly int $date,
        public readonly AbstractStarsTransactionPeer $peer,
        public readonly ?bool $refund = null,
        public readonly ?bool $pending = null,
        public readonly ?bool $failed = null,
        public readonly ?bool $gift = null,
        public readonly ?bool $reaction = null,
        public readonly ?string $title = null,
        public readonly ?string $description = null,
        public readonly ?AbstractWebDocument $photo = null,
        public readonly ?int $transactionDate = null,
        public readonly ?string $transactionUrl = null,
        public readonly ?string $botPayload = null,
        public readonly ?int $msgId = null,
        public readonly ?array $extendedMedia = null,
        public readonly ?int $subscriptionPeriod = null,
        public readonly ?int $giveawayPostId = null,
        public readonly ?StarGift $stargift = null,
        public readonly ?int $floodskipNumber = null,
        public readonly ?int $starrefCommissionPermille = null,
        public readonly ?AbstractPeer $starrefPeer = null,
        public readonly ?StarsAmount $starrefAmount = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->refund) $flags |= (1 << 3);
        if ($this->pending) $flags |= (1 << 4);
        if ($this->failed) $flags |= (1 << 6);
        if ($this->gift) $flags |= (1 << 10);
        if ($this->reaction) $flags |= (1 << 11);
        if ($this->title !== null) $flags |= (1 << 0);
        if ($this->description !== null) $flags |= (1 << 1);
        if ($this->photo !== null) $flags |= (1 << 2);
        if ($this->transactionDate !== null) $flags |= (1 << 5);
        if ($this->transactionUrl !== null) $flags |= (1 << 5);
        if ($this->botPayload !== null) $flags |= (1 << 7);
        if ($this->msgId !== null) $flags |= (1 << 8);
        if ($this->extendedMedia !== null) $flags |= (1 << 9);
        if ($this->subscriptionPeriod !== null) $flags |= (1 << 12);
        if ($this->giveawayPostId !== null) $flags |= (1 << 13);
        if ($this->stargift !== null) $flags |= (1 << 14);
        if ($this->floodskipNumber !== null) $flags |= (1 << 15);
        if ($this->starrefCommissionPermille !== null) $flags |= (1 << 16);
        if ($this->starrefPeer !== null) $flags |= (1 << 17);
        if ($this->starrefAmount !== null) $flags |= (1 << 17);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->id);
        $buffer .= $this->stars->serialize($serializer);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $this->peer->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->description);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->int32($this->transactionDate);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->bytes($this->transactionUrl);
        }
        if ($flags & (1 << 7)) {
            $buffer .= $serializer->bytes($this->botPayload);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $serializer->int32($this->msgId);
        }
        if ($flags & (1 << 9)) {
            $buffer .= $serializer->vectorOfObjects($this->extendedMedia);
        }
        if ($flags & (1 << 12)) {
            $buffer .= $serializer->int32($this->subscriptionPeriod);
        }
        if ($flags & (1 << 13)) {
            $buffer .= $serializer->int32($this->giveawayPostId);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $this->stargift->serialize($serializer);
        }
        if ($flags & (1 << 15)) {
            $buffer .= $serializer->int32($this->floodskipNumber);
        }
        if ($flags & (1 << 16)) {
            $buffer .= $serializer->int32($this->starrefCommissionPermille);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $this->starrefPeer->serialize($serializer);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $this->starrefAmount->serialize($serializer);
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

        $refund = ($flags & (1 << 3)) ? true : null;
        $pending = ($flags & (1 << 4)) ? true : null;
        $failed = ($flags & (1 << 6)) ? true : null;
        $gift = ($flags & (1 << 10)) ? true : null;
        $reaction = ($flags & (1 << 11)) ? true : null;
        $id = $deserializer->bytes($stream);
        $stars = StarsAmount::deserialize($deserializer, $stream);
        $date = $deserializer->int32($stream);
        $peer = AbstractStarsTransactionPeer::deserialize($deserializer, $stream);
        $title = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $description = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $photo = ($flags & (1 << 2)) ? AbstractWebDocument::deserialize($deserializer, $stream) : null;
        $transactionDate = ($flags & (1 << 5)) ? $deserializer->int32($stream) : null;
        $transactionUrl = ($flags & (1 << 5)) ? $deserializer->bytes($stream) : null;
        $botPayload = ($flags & (1 << 7)) ? $deserializer->bytes($stream) : null;
        $msgId = ($flags & (1 << 8)) ? $deserializer->int32($stream) : null;
        $extendedMedia = ($flags & (1 << 9)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageMedia::class, 'deserialize']) : null;
        $subscriptionPeriod = ($flags & (1 << 12)) ? $deserializer->int32($stream) : null;
        $giveawayPostId = ($flags & (1 << 13)) ? $deserializer->int32($stream) : null;
        $stargift = ($flags & (1 << 14)) ? StarGift::deserialize($deserializer, $stream) : null;
        $floodskipNumber = ($flags & (1 << 15)) ? $deserializer->int32($stream) : null;
        $starrefCommissionPermille = ($flags & (1 << 16)) ? $deserializer->int32($stream) : null;
        $starrefPeer = ($flags & (1 << 17)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $starrefAmount = ($flags & (1 << 17)) ? StarsAmount::deserialize($deserializer, $stream) : null;
        return new self(
            $id,
            $stars,
            $date,
            $peer,
            $refund,
            $pending,
            $failed,
            $gift,
            $reaction,
            $title,
            $description,
            $photo,
            $transactionDate,
            $transactionUrl,
            $botPayload,
            $msgId,
            $extendedMedia,
            $subscriptionPeriod,
            $giveawayPostId,
            $stargift,
            $floodskipNumber,
            $starrefCommissionPermille,
            $starrefPeer,
            $starrefAmount
        );
    }
}