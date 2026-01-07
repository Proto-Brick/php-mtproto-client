<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\ExportedInvoice;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.exportInvoice
 */
final class ExportInvoiceRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf91b065;
    
    public string $predicate = 'payments.exportInvoice';
    
    public function getMethodName(): string
    {
        return 'payments.exportInvoice';
    }
    
    public function getResponseClass(): string
    {
        return ExportedInvoice::class;
    }
    /**
     * @param AbstractInputMedia $invoiceMedia
     */
    public function __construct(
        public readonly AbstractInputMedia $invoiceMedia
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->invoiceMedia->serialize();
        return $buffer;
    }
}