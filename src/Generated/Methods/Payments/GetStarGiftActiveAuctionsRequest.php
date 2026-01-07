<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractStarGiftActiveAuctions;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarGiftActiveAuctions
 */
final class GetStarGiftActiveAuctionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa5d0514d;
    
    public string $predicate = 'payments.getStarGiftActiveAuctions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarGiftActiveAuctions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStarGiftActiveAuctions::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}