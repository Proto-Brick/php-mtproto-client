<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PremiumGiftCodeOption;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getPremiumGiftCodeOptions
 */
final class GetPremiumGiftCodeOptionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2757ba54;
    
    public string $predicate = 'payments.getPremiumGiftCodeOptions';
    
    public function getMethodName(): string
    {
        return 'payments.getPremiumGiftCodeOptions';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . PremiumGiftCodeOption::class . '>';
    }
    /**
     * @param AbstractInputPeer|null $boostPeer
     */
    public function __construct(
        public readonly ?AbstractInputPeer $boostPeer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->boostPeer !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->boostPeer->serialize();
        }
        return $buffer;
    }
}