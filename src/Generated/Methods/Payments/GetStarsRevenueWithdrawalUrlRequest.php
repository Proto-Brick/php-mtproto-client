<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\StarsRevenueWithdrawalUrl;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getStarsRevenueWithdrawalUrl
 */
final class GetStarsRevenueWithdrawalUrlRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2433dc92;
    
    public string $predicate = 'payments.getStarsRevenueWithdrawalUrl';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsRevenueWithdrawalUrl';
    }
    
    public function getResponseClass(): string
    {
        return StarsRevenueWithdrawalUrl::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputCheckPasswordSRP $password
     * @param true|null $ton
     * @param int|null $amount
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputCheckPasswordSRP $password,
        public readonly ?true $ton = null,
        public readonly ?int $amount = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->ton) {
            $flags |= (1 << 0);
        }
        if ($this->amount !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int64($this->amount);
        }
        $buffer .= $this->password->serialize();
        return $buffer;
    }
}