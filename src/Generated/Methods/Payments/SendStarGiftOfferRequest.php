<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStarsAmount;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.sendStarGiftOffer
 */
final class SendStarGiftOfferRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8fb86b41;
    
    public string $predicate = 'payments.sendStarGiftOffer';
    
    public function getMethodName(): string
    {
        return 'payments.sendStarGiftOffer';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $slug
     * @param AbstractStarsAmount $price
     * @param int $duration
     * @param int $randomId
     * @param int|null $allowPaidStars
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $slug,
        public readonly AbstractStarsAmount $price,
        public readonly int $duration,
        public readonly int $randomId,
        public readonly ?int $allowPaidStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->allowPaidStars !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->slug);
        $buffer .= $this->price->serialize();
        $buffer .= Serializer::int32($this->duration);
        $buffer .= Serializer::int64($this->randomId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->allowPaidStars);
        }
        return $buffer;
    }
}