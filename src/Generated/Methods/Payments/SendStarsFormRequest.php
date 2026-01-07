<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputInvoice;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractPaymentResult;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.sendStarsForm
 */
final class SendStarsFormRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7998c914;
    
    public string $predicate = 'payments.sendStarsForm';
    
    public function getMethodName(): string
    {
        return 'payments.sendStarsForm';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPaymentResult::class;
    }
    /**
     * @param int $formId
     * @param AbstractInputInvoice $invoice
     */
    public function __construct(
        public readonly int $formId,
        public readonly AbstractInputInvoice $invoice
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->formId);
        $buffer .= $this->invoice->serialize();
        return $buffer;
    }
}