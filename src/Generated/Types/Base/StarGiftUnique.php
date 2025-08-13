<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starGiftUnique
 */
final class StarGiftUnique extends AbstractStarGift
{
    public const CONSTRUCTOR_ID = 0x3a274d50;
    
    public string $predicate = 'starGiftUnique';
    
    /**
     * @param int $id
     * @param string $title
     * @param string $slug
     * @param int $num
     * @param list<AbstractStarGiftAttribute> $attributes
     * @param int $availabilityIssued
     * @param int $availabilityTotal
     * @param true|null $requirePremium
     * @param true|null $resaleTonOnly
     * @param AbstractPeer|null $ownerId
     * @param string|null $ownerName
     * @param string|null $ownerAddress
     * @param string|null $giftAddress
     * @param list<AbstractStarsAmount>|null $resellAmount
     * @param AbstractPeer|null $releasedBy
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly string $slug,
        public readonly int $num,
        public readonly array $attributes,
        public readonly int $availabilityIssued,
        public readonly int $availabilityTotal,
        public readonly ?true $requirePremium = null,
        public readonly ?true $resaleTonOnly = null,
        public readonly ?AbstractPeer $ownerId = null,
        public readonly ?string $ownerName = null,
        public readonly ?string $ownerAddress = null,
        public readonly ?string $giftAddress = null,
        public readonly ?array $resellAmount = null,
        public readonly ?AbstractPeer $releasedBy = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requirePremium) $flags |= (1 << 6);
        if ($this->resaleTonOnly) $flags |= (1 << 7);
        if ($this->ownerId !== null) $flags |= (1 << 0);
        if ($this->ownerName !== null) $flags |= (1 << 1);
        if ($this->ownerAddress !== null) $flags |= (1 << 2);
        if ($this->giftAddress !== null) $flags |= (1 << 3);
        if ($this->resellAmount !== null) $flags |= (1 << 4);
        if ($this->releasedBy !== null) $flags |= (1 << 5);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->slug);
        $buffer .= Serializer::int32($this->num);
        if ($flags & (1 << 0)) {
            $buffer .= $this->ownerId->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->ownerName);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->ownerAddress);
        }
        $buffer .= Serializer::vectorOfObjects($this->attributes);
        $buffer .= Serializer::int32($this->availabilityIssued);
        $buffer .= Serializer::int32($this->availabilityTotal);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->giftAddress);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::vectorOfObjects($this->resellAmount);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->releasedBy->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $requirePremium = ($flags & (1 << 6)) ? true : null;
        $resaleTonOnly = ($flags & (1 << 7)) ? true : null;
        $id = Deserializer::int64($stream);
        $title = Deserializer::bytes($stream);
        $slug = Deserializer::bytes($stream);
        $num = Deserializer::int32($stream);
        $ownerId = ($flags & (1 << 0)) ? AbstractPeer::deserialize($stream) : null;
        $ownerName = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $ownerAddress = ($flags & (1 << 2)) ? Deserializer::bytes($stream) : null;
        $attributes = Deserializer::vectorOfObjects($stream, [AbstractStarGiftAttribute::class, 'deserialize']);
        $availabilityIssued = Deserializer::int32($stream);
        $availabilityTotal = Deserializer::int32($stream);
        $giftAddress = ($flags & (1 << 3)) ? Deserializer::bytes($stream) : null;
        $resellAmount = ($flags & (1 << 4)) ? Deserializer::vectorOfObjects($stream, [AbstractStarsAmount::class, 'deserialize']) : null;
        $releasedBy = ($flags & (1 << 5)) ? AbstractPeer::deserialize($stream) : null;

        return new self(
            $id,
            $title,
            $slug,
            $num,
            $attributes,
            $availabilityIssued,
            $availabilityTotal,
            $requirePremium,
            $resaleTonOnly,
            $ownerId,
            $ownerName,
            $ownerAddress,
            $giftAddress,
            $resellAmount,
            $releasedBy
        );
    }
}