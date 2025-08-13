<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputInvoice;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractPaymentForm;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getPaymentForm
 */
final class GetPaymentFormRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x37148dbb;
    
    public string $predicate = 'payments.getPaymentForm';
    
    public function getMethodName(): string
    {
        return 'payments.getPaymentForm';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPaymentForm::class;
    }
    /**
     * @param AbstractInputInvoice $invoice
     * @param array|null $themeParams
     */
    public function __construct(
        public readonly AbstractInputInvoice $invoice,
        public readonly ?array $themeParams = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->themeParams !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->invoice->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::serializeDataJSON($this->themeParams);
        }
        return $buffer;
    }
}