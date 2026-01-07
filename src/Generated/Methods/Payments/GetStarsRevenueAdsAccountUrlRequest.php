<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarsRevenueAdsAccountUrl;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarsRevenueAdsAccountUrl
 */
final class GetStarsRevenueAdsAccountUrlRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd1d7efc5;
    
    public string $predicate = 'payments.getStarsRevenueAdsAccountUrl';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsRevenueAdsAccountUrl';
    }
    
    public function getResponseClass(): string
    {
        return StarsRevenueAdsAccountUrl::class;
    }
    /**
     * @param AbstractInputPeer $peer
     */
    public function __construct(
        public readonly AbstractInputPeer $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}