<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Payments\AbstractGiveawayInfo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.getGiveawayInfo
 */
final class GetGiveawayInfoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf4239425;
    
    public string $predicate = 'payments.getGiveawayInfo';
    
    public function getMethodName(): string
    {
        return 'payments.getGiveawayInfo';
    }
    
    public function getResponseClass(): string
    {
        return AbstractGiveawayInfo::class;
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