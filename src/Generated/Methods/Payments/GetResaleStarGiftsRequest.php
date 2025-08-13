<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStarGiftAttributeId;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\ResaleStarGifts;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getResaleStarGifts
 */
final class GetResaleStarGiftsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7a5fa236;
    
    public string $predicate = 'payments.getResaleStarGifts';
    
    public function getMethodName(): string
    {
        return 'payments.getResaleStarGifts';
    }
    
    public function getResponseClass(): string
    {
        return ResaleStarGifts::class;
    }
    /**
     * @param int $giftId
     * @param string $offset
     * @param int $limit
     * @param true|null $sortByPrice
     * @param true|null $sortByNum
     * @param int|null $attributesHash
     * @param list<AbstractStarGiftAttributeId>|null $attributes
     */
    public function __construct(
        public readonly int $giftId,
        public readonly string $offset,
        public readonly int $limit,
        public readonly ?true $sortByPrice = null,
        public readonly ?true $sortByNum = null,
        public readonly ?int $attributesHash = null,
        public readonly ?array $attributes = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->sortByPrice) {
            $flags |= (1 << 1);
        }
        if ($this->sortByNum) {
            $flags |= (1 << 2);
        }
        if ($this->attributesHash !== null) {
            $flags |= (1 << 0);
        }
        if ($this->attributes !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->attributesHash);
        }
        $buffer .= Serializer::int64($this->giftId);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->attributes);
        }
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}