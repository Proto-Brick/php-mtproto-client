<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starGiftAuctionStateFinished
 */
final class StarGiftAuctionStateFinished extends AbstractStarGiftAuctionState
{
    public const CONSTRUCTOR_ID = 0x972dabbf;
    
    public string $predicate = 'starGiftAuctionStateFinished';
    
    /**
     * @param int $startDate
     * @param int $endDate
     * @param int $averagePrice
     * @param int|null $listedCount
     * @param int|null $fragmentListedCount
     * @param string|null $fragmentListedUrl
     */
    public function __construct(
        public readonly int $startDate,
        public readonly int $endDate,
        public readonly int $averagePrice,
        public readonly ?int $listedCount = null,
        public readonly ?int $fragmentListedCount = null,
        public readonly ?string $fragmentListedUrl = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->listedCount !== null) {
            $flags |= (1 << 0);
        }
        if ($this->fragmentListedCount !== null) {
            $flags |= (1 << 1);
        }
        if ($this->fragmentListedUrl !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->startDate);
        $buffer .= Serializer::int32($this->endDate);
        $buffer .= Serializer::int64($this->averagePrice);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->listedCount);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->fragmentListedCount);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->fragmentListedUrl);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $startDate = Deserializer::int32($__payload, $__offset);
        $endDate = Deserializer::int32($__payload, $__offset);
        $averagePrice = Deserializer::int64($__payload, $__offset);
        $listedCount = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $fragmentListedCount = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $fragmentListedUrl = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $startDate,
            $endDate,
            $averagePrice,
            $listedCount,
            $fragmentListedCount,
            $fragmentListedUrl
        );
    }
}