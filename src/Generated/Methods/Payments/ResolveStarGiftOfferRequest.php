<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.resolveStarGiftOffer
 */
final class ResolveStarGiftOfferRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe9ce781c;
    
    public string $predicate = 'payments.resolveStarGiftOffer';
    
    public function getMethodName(): string
    {
        return 'payments.resolveStarGiftOffer';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param int $offerMsgId
     * @param true|null $decline
     */
    public function __construct(
        public readonly int $offerMsgId,
        public readonly ?true $decline = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->decline) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->offerMsgId);
        return $buffer;
    }
}