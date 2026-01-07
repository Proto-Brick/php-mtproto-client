<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starGiftAuctionUserState
 */
final class StarGiftAuctionUserState extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2eeed1c4;
    
    public string $predicate = 'starGiftAuctionUserState';
    
    /**
     * @param int $acquiredCount
     * @param true|null $returned
     * @param int|null $bidAmount
     * @param int|null $bidDate
     * @param int|null $minBidAmount
     * @param AbstractPeer|null $bidPeer
     */
    public function __construct(
        public readonly int $acquiredCount,
        public readonly ?true $returned = null,
        public readonly ?int $bidAmount = null,
        public readonly ?int $bidDate = null,
        public readonly ?int $minBidAmount = null,
        public readonly ?AbstractPeer $bidPeer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->returned) {
            $flags |= (1 << 1);
        }
        if ($this->bidAmount !== null) {
            $flags |= (1 << 0);
        }
        if ($this->bidDate !== null) {
            $flags |= (1 << 0);
        }
        if ($this->minBidAmount !== null) {
            $flags |= (1 << 0);
        }
        if ($this->bidPeer !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->bidAmount);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->bidDate);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->minBidAmount);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $this->bidPeer->serialize();
        }
        $buffer .= Serializer::int32($this->acquiredCount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $returned = (($flags & (1 << 1)) !== 0) ? true : null;
        $bidAmount = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $bidDate = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $minBidAmount = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $bidPeer = (($flags & (1 << 0)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $acquiredCount = Deserializer::int32($__payload, $__offset);

        return new self(
            $acquiredCount,
            $returned,
            $bidAmount,
            $bidDate,
            $minBidAmount,
            $bidPeer
        );
    }
}