<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractCheckCanSendGiftResult;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.checkCanSendGift
 */
final class CheckCanSendGiftRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc0c4edc9;
    
    public string $predicate = 'payments.checkCanSendGift';
    
    public function getMethodName(): string
    {
        return 'payments.checkCanSendGift';
    }
    
    public function getResponseClass(): string
    {
        return AbstractCheckCanSendGiftResult::class;
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