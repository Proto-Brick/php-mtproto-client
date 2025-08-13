<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\PaidMessagesRevenue;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getPaidMessagesRevenue
 */
final class GetPaidMessagesRevenueRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x19ba4a67;
    
    public string $predicate = 'account.getPaidMessagesRevenue';
    
    public function getMethodName(): string
    {
        return 'account.getPaidMessagesRevenue';
    }
    
    public function getResponseClass(): string
    {
        return PaidMessagesRevenue::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param AbstractInputPeer|null $parentPeer
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly ?AbstractInputPeer $parentPeer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->parentPeer !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->parentPeer->serialize();
        }
        $buffer .= $this->userId->serialize();
        return $buffer;
    }
}