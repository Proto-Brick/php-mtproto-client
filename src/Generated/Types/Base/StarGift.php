<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starGift
 */
final class StarGift extends TlObject
{
    public const CONSTRUCTOR_ID = 0x49c577cd;
    
    public string $_ = 'starGift';
    
    /**
     * @param int $id
     * @param AbstractDocument $sticker
     * @param int $stars
     * @param int $convertStars
     * @param bool|null $limited
     * @param bool|null $soldOut
     * @param bool|null $birthday
     * @param int|null $availabilityRemains
     * @param int|null $availabilityTotal
     * @param int|null $firstSaleDate
     * @param int|null $lastSaleDate
     */
    public function __construct(
        public readonly int $id,
        public readonly AbstractDocument $sticker,
        public readonly int $stars,
        public readonly int $convertStars,
        public readonly ?bool $limited = null,
        public readonly ?bool $soldOut = null,
        public readonly ?bool $birthday = null,
        public readonly ?int $availabilityRemains = null,
        public readonly ?int $availabilityTotal = null,
        public readonly ?int $firstSaleDate = null,
        public readonly ?int $lastSaleDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->limited) $flags |= (1 << 0);
        if ($this->soldOut) $flags |= (1 << 1);
        if ($this->birthday) $flags |= (1 << 2);
        if ($this->availabilityRemains !== null) $flags |= (1 << 0);
        if ($this->availabilityTotal !== null) $flags |= (1 << 0);
        if ($this->firstSaleDate !== null) $flags |= (1 << 1);
        if ($this->lastSaleDate !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->id);
        $buffer .= $this->sticker->serialize();
        $buffer .= Serializer::int64($this->stars);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->availabilityRemains);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->availabilityTotal);
        }
        $buffer .= Serializer::int64($this->convertStars);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->firstSaleDate);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->lastSaleDate);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $limited = ($flags & (1 << 0)) ? true : null;
        $soldOut = ($flags & (1 << 1)) ? true : null;
        $birthday = ($flags & (1 << 2)) ? true : null;
        $id = Deserializer::int64($stream);
        $sticker = AbstractDocument::deserialize($stream);
        $stars = Deserializer::int64($stream);
        $availabilityRemains = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $availabilityTotal = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $convertStars = Deserializer::int64($stream);
        $firstSaleDate = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $lastSaleDate = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        return new self(
            $id,
            $sticker,
            $stars,
            $convertStars,
            $limited,
            $soldOut,
            $birthday,
            $availabilityRemains,
            $availabilityTotal,
            $firstSaleDate,
            $lastSaleDate
        );
    }
}