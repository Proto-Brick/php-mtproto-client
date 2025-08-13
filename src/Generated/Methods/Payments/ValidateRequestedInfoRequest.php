<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputInvoice;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PaymentRequestedInfo;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\ValidatedRequestedInfo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.validateRequestedInfo
 */
final class ValidateRequestedInfoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb6c8f12b;
    
    public string $predicate = 'payments.validateRequestedInfo';
    
    public function getMethodName(): string
    {
        return 'payments.validateRequestedInfo';
    }
    
    public function getResponseClass(): string
    {
        return ValidatedRequestedInfo::class;
    }
    /**
     * @param AbstractInputInvoice $invoice
     * @param PaymentRequestedInfo $info
     * @param true|null $save
     */
    public function __construct(
        public readonly AbstractInputInvoice $invoice,
        public readonly PaymentRequestedInfo $info,
        public readonly ?true $save = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->save) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->invoice->serialize();
        $buffer .= $this->info->serialize();
        return $buffer;
    }
}