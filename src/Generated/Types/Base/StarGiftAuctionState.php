<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starGiftAuctionState
 */
final class StarGiftAuctionState extends AbstractStarGiftAuctionState
{
    public const CONSTRUCTOR_ID = 0x771a4e66;
    
    public string $predicate = 'starGiftAuctionState';
    
    /**
     * @param int $version
     * @param int $startDate
     * @param int $endDate
     * @param int $minBidAmount
     * @param list<AuctionBidLevel> $bidLevels
     * @param list<int> $topBidders
     * @param int $nextRoundAt
     * @param int $lastGiftNum
     * @param int $giftsLeft
     * @param int $currentRound
     * @param int $totalRounds
     * @param list<AbstractStarGiftAuctionRound> $rounds
     */
    public function __construct(
        public readonly int $version,
        public readonly int $startDate,
        public readonly int $endDate,
        public readonly int $minBidAmount,
        public readonly array $bidLevels,
        public readonly array $topBidders,
        public readonly int $nextRoundAt,
        public readonly int $lastGiftNum,
        public readonly int $giftsLeft,
        public readonly int $currentRound,
        public readonly int $totalRounds,
        public readonly array $rounds
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->version);
        $buffer .= Serializer::int32($this->startDate);
        $buffer .= Serializer::int32($this->endDate);
        $buffer .= Serializer::int64($this->minBidAmount);
        $buffer .= Serializer::vectorOfObjects($this->bidLevels);
        $buffer .= Serializer::vectorOfLongs($this->topBidders);
        $buffer .= Serializer::int32($this->nextRoundAt);
        $buffer .= Serializer::int32($this->lastGiftNum);
        $buffer .= Serializer::int32($this->giftsLeft);
        $buffer .= Serializer::int32($this->currentRound);
        $buffer .= Serializer::int32($this->totalRounds);
        $buffer .= Serializer::vectorOfObjects($this->rounds);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $version = Deserializer::int32($__payload, $__offset);
        $startDate = Deserializer::int32($__payload, $__offset);
        $endDate = Deserializer::int32($__payload, $__offset);
        $minBidAmount = Deserializer::int64($__payload, $__offset);
        $bidLevels = Deserializer::vectorOfObjects($__payload, $__offset, [AuctionBidLevel::class, 'deserialize']);
        $topBidders = Deserializer::vectorOfLongs($__payload, $__offset);
        $nextRoundAt = Deserializer::int32($__payload, $__offset);
        $lastGiftNum = Deserializer::int32($__payload, $__offset);
        $giftsLeft = Deserializer::int32($__payload, $__offset);
        $currentRound = Deserializer::int32($__payload, $__offset);
        $totalRounds = Deserializer::int32($__payload, $__offset);
        $rounds = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractStarGiftAuctionRound::class, 'deserialize']);

        return new self(
            $version,
            $startDate,
            $endDate,
            $minBidAmount,
            $bidLevels,
            $topBidders,
            $nextRoundAt,
            $lastGiftNum,
            $giftsLeft,
            $currentRound,
            $totalRounds,
            $rounds
        );
    }
}