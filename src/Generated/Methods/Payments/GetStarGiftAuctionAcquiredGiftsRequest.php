<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftAuctionAcquiredGifts;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarGiftAuctionAcquiredGifts
 */
final class GetStarGiftAuctionAcquiredGiftsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6ba2cbec;
    
    public string $predicate = 'payments.getStarGiftAuctionAcquiredGifts';
    
    public function getMethodName(): string
    {
        return 'payments.getStarGiftAuctionAcquiredGifts';
    }
    
    public function getResponseClass(): string
    {
        return StarGiftAuctionAcquiredGifts::class;
    }
    /**
     * @param int $giftId
     */
    public function __construct(
        public readonly int $giftId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->giftId);
        return $buffer;
    }
}