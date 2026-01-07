<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftUpgradeAttributes;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarGiftUpgradeAttributes
 */
final class GetStarGiftUpgradeAttributesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6d038b58;
    
    public string $predicate = 'payments.getStarGiftUpgradeAttributes';
    
    public function getMethodName(): string
    {
        return 'payments.getStarGiftUpgradeAttributes';
    }
    
    public function getResponseClass(): string
    {
        return StarGiftUpgradeAttributes::class;
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