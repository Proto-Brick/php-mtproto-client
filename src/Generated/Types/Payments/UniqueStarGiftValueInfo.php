<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/payments.uniqueStarGiftValueInfo
 */
final class UniqueStarGiftValueInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0x512fe446;
    
    public string $predicate = 'payments.uniqueStarGiftValueInfo';
    
    /**
     * @param string $currency
     * @param int $value
     * @param int $initialSaleDate
     * @param int $initialSaleStars
     * @param int $initialSalePrice
     * @param true|null $lastSaleOnFragment
     * @param true|null $valueIsAverage
     * @param int|null $lastSaleDate
     * @param int|null $lastSalePrice
     * @param int|null $floorPrice
     * @param int|null $averagePrice
     * @param int|null $listedCount
     * @param int|null $fragmentListedCount
     * @param string|null $fragmentListedUrl
     */
    public function __construct(
        public readonly string $currency,
        public readonly int $value,
        public readonly int $initialSaleDate,
        public readonly int $initialSaleStars,
        public readonly int $initialSalePrice,
        public readonly ?true $lastSaleOnFragment = null,
        public readonly ?true $valueIsAverage = null,
        public readonly ?int $lastSaleDate = null,
        public readonly ?int $lastSalePrice = null,
        public readonly ?int $floorPrice = null,
        public readonly ?int $averagePrice = null,
        public readonly ?int $listedCount = null,
        public readonly ?int $fragmentListedCount = null,
        public readonly ?string $fragmentListedUrl = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->lastSaleOnFragment) {
            $flags |= (1 << 1);
        }
        if ($this->valueIsAverage) {
            $flags |= (1 << 6);
        }
        if ($this->lastSaleDate !== null) {
            $flags |= (1 << 0);
        }
        if ($this->lastSalePrice !== null) {
            $flags |= (1 << 0);
        }
        if ($this->floorPrice !== null) {
            $flags |= (1 << 2);
        }
        if ($this->averagePrice !== null) {
            $flags |= (1 << 3);
        }
        if ($this->listedCount !== null) {
            $flags |= (1 << 4);
        }
        if ($this->fragmentListedCount !== null) {
            $flags |= (1 << 5);
        }
        if ($this->fragmentListedUrl !== null) {
            $flags |= (1 << 5);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->value);
        $buffer .= Serializer::int32($this->initialSaleDate);
        $buffer .= Serializer::int64($this->initialSaleStars);
        $buffer .= Serializer::int64($this->initialSalePrice);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->lastSaleDate);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->lastSalePrice);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int64($this->floorPrice);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int64($this->averagePrice);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->listedCount);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int32($this->fragmentListedCount);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::bytes($this->fragmentListedUrl);
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
        $lastSaleOnFragment = (($flags & (1 << 1)) !== 0) ? true : null;
        $valueIsAverage = (($flags & (1 << 6)) !== 0) ? true : null;
        $currency = Deserializer::bytes($__payload, $__offset);
        $value = Deserializer::int64($__payload, $__offset);
        $initialSaleDate = Deserializer::int32($__payload, $__offset);
        $initialSaleStars = Deserializer::int64($__payload, $__offset);
        $initialSalePrice = Deserializer::int64($__payload, $__offset);
        $lastSaleDate = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $lastSalePrice = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $floorPrice = (($flags & (1 << 2)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $averagePrice = (($flags & (1 << 3)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $listedCount = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $fragmentListedCount = (($flags & (1 << 5)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $fragmentListedUrl = (($flags & (1 << 5)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $currency,
            $value,
            $initialSaleDate,
            $initialSaleStars,
            $initialSalePrice,
            $lastSaleOnFragment,
            $valueIsAverage,
            $lastSaleDate,
            $lastSalePrice,
            $floorPrice,
            $averagePrice,
            $listedCount,
            $fragmentListedCount,
            $fragmentListedUrl
        );
    }
}