<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStorePaymentPurpose;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.assignAppStoreTransaction
 */
final class AssignAppStoreTransactionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x80ed747d;
    
    public string $predicate = 'payments.assignAppStoreTransaction';
    
    public function getMethodName(): string
    {
        return 'payments.assignAppStoreTransaction';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param string $receipt
     * @param AbstractInputStorePaymentPurpose $purpose
     */
    public function __construct(
        public readonly string $receipt,
        public readonly AbstractInputStorePaymentPurpose $purpose
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->receipt);
        $buffer .= $this->purpose->serialize();
        return $buffer;
    }
}