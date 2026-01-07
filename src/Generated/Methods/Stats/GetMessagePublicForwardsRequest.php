<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stats;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Stats\PublicForwards;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stats.getMessagePublicForwards
 */
final class GetMessagePublicForwardsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5f150144;
    
    public string $predicate = 'stats.getMessagePublicForwards';
    
    public function getMethodName(): string
    {
        return 'stats.getMessagePublicForwards';
    }
    
    public function getResponseClass(): string
    {
        return PublicForwards::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $msgId
     * @param string $offset
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $msgId,
        public readonly string $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}