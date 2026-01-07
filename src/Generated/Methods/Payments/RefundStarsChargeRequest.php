<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.refundStarsCharge
 */
final class RefundStarsChargeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x25ae8f4a;
    
    public string $predicate = 'payments.refundStarsCharge';
    
    public function getMethodName(): string
    {
        return 'payments.refundStarsCharge';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param string $chargeId
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly string $chargeId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::bytes($this->chargeId);
        return $buffer;
    }
}