<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftUpgradePreview;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarGiftUpgradePreview
 */
final class GetStarGiftUpgradePreviewRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9c9abcb1;
    
    public string $predicate = 'payments.getStarGiftUpgradePreview';
    
    public function getMethodName(): string
    {
        return 'payments.getStarGiftUpgradePreview';
    }
    
    public function getResponseClass(): string
    {
        return StarGiftUpgradePreview::class;
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