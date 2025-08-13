<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractPaymentReceipt;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getPaymentReceipt
 */
final class GetPaymentReceiptRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2478d1cc;
    
    public string $predicate = 'payments.getPaymentReceipt';
    
    public function getMethodName(): string
    {
        return 'payments.getPaymentReceipt';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPaymentReceipt::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        return $buffer;
    }
}