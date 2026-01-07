<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStarGiftAuction;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarGiftAuctionState;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarGiftAuctionState
 */
final class GetStarGiftAuctionStateRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5c9ff4d6;
    
    public string $predicate = 'payments.getStarGiftAuctionState';
    
    public function getMethodName(): string
    {
        return 'payments.getStarGiftAuctionState';
    }
    
    public function getResponseClass(): string
    {
        return StarGiftAuctionState::class;
    }
    /**
     * @param AbstractInputStarGiftAuction $auction
     * @param int $version
     */
    public function __construct(
        public readonly AbstractInputStarGiftAuction $auction,
        public readonly int $version
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->auction->serialize();
        $buffer .= Serializer::int32($this->version);
        return $buffer;
    }
}