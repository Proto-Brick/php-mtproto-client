<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starsTransaction
 */
final class StarsTransaction extends TlObject
{
    public const CONSTRUCTOR_ID = 0x13659eb0;
    
    public string $predicate = 'starsTransaction';
    
    /**
     * @param string $id
     * @param AbstractStarsAmount $amount
     * @param int $date
     * @param AbstractStarsTransactionPeer $peer
     * @param true|null $refund
     * @param true|null $pending
     * @param true|null $failed
     * @param true|null $gift
     * @param true|null $reaction
     * @param true|null $stargiftUpgrade
     * @param true|null $businessTransfer
     * @param true|null $stargiftResale
     * @param true|null $postsSearch
     * @param true|null $stargiftPrepaidUpgrade
     * @param true|null $stargiftDropOriginalDetails
     * @param true|null $phonegroupMessage
     * @param true|null $stargiftAuctionBid
     * @param true|null $offer
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
     * @param AbstractStarGift|null $stargift
     * @param int|null $floodskipNumber
     * @param int|null $starrefCommissionPermille
     * @param AbstractPeer|null $starrefPeer
     * @param AbstractStarsAmount|null $starrefAmount
     * @param int|null $paidMessages
     * @param int|null $premiumGiftMonths
     * @param int|null $adsProceedsFromDate
     * @param int|null $adsProceedsToDate
     */
    public function __construct(
        public readonly string $id,
        public readonly AbstractStarsAmount $amount,
        public readonly int $date,
        public readonly AbstractStarsTransactionPeer $peer,
        public readonly ?true $refund = null,
        public readonly ?true $pending = null,
        public readonly ?true $failed = null,
        public readonly ?true $gift = null,
        public readonly ?true $reaction = null,
        public readonly ?true $stargiftUpgrade = null,
        public readonly ?true $businessTransfer = null,
        public readonly ?true $stargiftResale = null,
        public readonly ?true $postsSearch = null,
        public readonly ?true $stargiftPrepaidUpgrade = null,
        public readonly ?true $stargiftDropOriginalDetails = null,
        public readonly ?true $phonegroupMessage = null,
        public readonly ?true $stargiftAuctionBid = null,
        public readonly ?true $offer = null,
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
        public readonly ?AbstractStarGift $stargift = null,
        public readonly ?int $floodskipNumber = null,
        public readonly ?int $starrefCommissionPermille = null,
        public readonly ?AbstractPeer $starrefPeer = null,
        public readonly ?AbstractStarsAmount $starrefAmount = null,
        public readonly ?int $paidMessages = null,
        public readonly ?int $premiumGiftMonths = null,
        public readonly ?int $adsProceedsFromDate = null,
        public readonly ?int $adsProceedsToDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->refund) {
            $flags |= (1 << 3);
        }
        if ($this->pending) {
            $flags |= (1 << 4);
        }
        if ($this->failed) {
            $flags |= (1 << 6);
        }
        if ($this->gift) {
            $flags |= (1 << 10);
        }
        if ($this->reaction) {
            $flags |= (1 << 11);
        }
        if ($this->stargiftUpgrade) {
            $flags |= (1 << 18);
        }
        if ($this->businessTransfer) {
            $flags |= (1 << 21);
        }
        if ($this->stargiftResale) {
            $flags |= (1 << 22);
        }
        if ($this->postsSearch) {
            $flags |= (1 << 24);
        }
        if ($this->stargiftPrepaidUpgrade) {
            $flags |= (1 << 25);
        }
        if ($this->stargiftDropOriginalDetails) {
            $flags |= (1 << 26);
        }
        if ($this->phonegroupMessage) {
            $flags |= (1 << 27);
        }
        if ($this->stargiftAuctionBid) {
            $flags |= (1 << 28);
        }
        if ($this->offer) {
            $flags |= (1 << 29);
        }
        if ($this->title !== null) {
            $flags |= (1 << 0);
        }
        if ($this->description !== null) {
            $flags |= (1 << 1);
        }
        if ($this->photo !== null) {
            $flags |= (1 << 2);
        }
        if ($this->transactionDate !== null) {
            $flags |= (1 << 5);
        }
        if ($this->transactionUrl !== null) {
            $flags |= (1 << 5);
        }
        if ($this->botPayload !== null) {
            $flags |= (1 << 7);
        }
        if ($this->msgId !== null) {
            $flags |= (1 << 8);
        }
        if ($this->extendedMedia !== null) {
            $flags |= (1 << 9);
        }
        if ($this->subscriptionPeriod !== null) {
            $flags |= (1 << 12);
        }
        if ($this->giveawayPostId !== null) {
            $flags |= (1 << 13);
        }
        if ($this->stargift !== null) {
            $flags |= (1 << 14);
        }
        if ($this->floodskipNumber !== null) {
            $flags |= (1 << 15);
        }
        if ($this->starrefCommissionPermille !== null) {
            $flags |= (1 << 16);
        }
        if ($this->starrefPeer !== null) {
            $flags |= (1 << 17);
        }
        if ($this->starrefAmount !== null) {
            $flags |= (1 << 17);
        }
        if ($this->paidMessages !== null) {
            $flags |= (1 << 19);
        }
        if ($this->premiumGiftMonths !== null) {
            $flags |= (1 << 20);
        }
        if ($this->adsProceedsFromDate !== null) {
            $flags |= (1 << 23);
        }
        if ($this->adsProceedsToDate !== null) {
            $flags |= (1 << 23);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= $this->amount->serialize();
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->description);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->photo->serialize();
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int32($this->transactionDate);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::bytes($this->transactionUrl);
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::bytes($this->botPayload);
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::int32($this->msgId);
        }
        if ($flags & (1 << 9)) {
            $buffer .= Serializer::vectorOfObjects($this->extendedMedia);
        }
        if ($flags & (1 << 12)) {
            $buffer .= Serializer::int32($this->subscriptionPeriod);
        }
        if ($flags & (1 << 13)) {
            $buffer .= Serializer::int32($this->giveawayPostId);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $this->stargift->serialize();
        }
        if ($flags & (1 << 15)) {
            $buffer .= Serializer::int32($this->floodskipNumber);
        }
        if ($flags & (1 << 16)) {
            $buffer .= Serializer::int32($this->starrefCommissionPermille);
        }
        if ($flags & (1 << 17)) {
            $buffer .= $this->starrefPeer->serialize();
        }
        if ($flags & (1 << 17)) {
            $buffer .= $this->starrefAmount->serialize();
        }
        if ($flags & (1 << 19)) {
            $buffer .= Serializer::int32($this->paidMessages);
        }
        if ($flags & (1 << 20)) {
            $buffer .= Serializer::int32($this->premiumGiftMonths);
        }
        if ($flags & (1 << 23)) {
            $buffer .= Serializer::int32($this->adsProceedsFromDate);
        }
        if ($flags & (1 << 23)) {
            $buffer .= Serializer::int32($this->adsProceedsToDate);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $refund = (($flags & (1 << 3)) !== 0) ? true : null;
        $pending = (($flags & (1 << 4)) !== 0) ? true : null;
        $failed = (($flags & (1 << 6)) !== 0) ? true : null;
        $gift = (($flags & (1 << 10)) !== 0) ? true : null;
        $reaction = (($flags & (1 << 11)) !== 0) ? true : null;
        $stargiftUpgrade = (($flags & (1 << 18)) !== 0) ? true : null;
        $businessTransfer = (($flags & (1 << 21)) !== 0) ? true : null;
        $stargiftResale = (($flags & (1 << 22)) !== 0) ? true : null;
        $postsSearch = (($flags & (1 << 24)) !== 0) ? true : null;
        $stargiftPrepaidUpgrade = (($flags & (1 << 25)) !== 0) ? true : null;
        $stargiftDropOriginalDetails = (($flags & (1 << 26)) !== 0) ? true : null;
        $phonegroupMessage = (($flags & (1 << 27)) !== 0) ? true : null;
        $stargiftAuctionBid = (($flags & (1 << 28)) !== 0) ? true : null;
        $offer = (($flags & (1 << 29)) !== 0) ? true : null;
        $id = Deserializer::bytes($__payload, $__offset);
        $amount = AbstractStarsAmount::deserialize($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $peer = AbstractStarsTransactionPeer::deserialize($__payload, $__offset);
        $title = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $description = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $photo = (($flags & (1 << 2)) !== 0) ? AbstractWebDocument::deserialize($__payload, $__offset) : null;
        $transactionDate = (($flags & (1 << 5)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $transactionUrl = (($flags & (1 << 5)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $botPayload = (($flags & (1 << 7)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $msgId = (($flags & (1 << 8)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $extendedMedia = (($flags & (1 << 9)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessageMedia::class, 'deserialize']) : null;
        $subscriptionPeriod = (($flags & (1 << 12)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $giveawayPostId = (($flags & (1 << 13)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $stargift = (($flags & (1 << 14)) !== 0) ? AbstractStarGift::deserialize($__payload, $__offset) : null;
        $floodskipNumber = (($flags & (1 << 15)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $starrefCommissionPermille = (($flags & (1 << 16)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $starrefPeer = (($flags & (1 << 17)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $starrefAmount = (($flags & (1 << 17)) !== 0) ? AbstractStarsAmount::deserialize($__payload, $__offset) : null;
        $paidMessages = (($flags & (1 << 19)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $premiumGiftMonths = (($flags & (1 << 20)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $adsProceedsFromDate = (($flags & (1 << 23)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $adsProceedsToDate = (($flags & (1 << 23)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $id,
            $amount,
            $date,
            $peer,
            $refund,
            $pending,
            $failed,
            $gift,
            $reaction,
            $stargiftUpgrade,
            $businessTransfer,
            $stargiftResale,
            $postsSearch,
            $stargiftPrepaidUpgrade,
            $stargiftDropOriginalDetails,
            $phonegroupMessage,
            $stargiftAuctionBid,
            $offer,
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
            $starrefAmount,
            $paidMessages,
            $premiumGiftMonths,
            $adsProceedsFromDate,
            $adsProceedsToDate
        );
    }
}