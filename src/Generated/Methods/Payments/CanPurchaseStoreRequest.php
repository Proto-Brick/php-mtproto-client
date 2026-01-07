<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStorePaymentPurpose;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.canPurchaseStore
 */
final class CanPurchaseStoreRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4fdc5ea7;
    
    public string $predicate = 'payments.canPurchaseStore';
    
    public function getMethodName(): string
    {
        return 'payments.canPurchaseStore';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputStorePaymentPurpose $purpose
     */
    public function __construct(
        public readonly AbstractInputStorePaymentPurpose $purpose
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->purpose->serialize();
        return $buffer;
    }
}