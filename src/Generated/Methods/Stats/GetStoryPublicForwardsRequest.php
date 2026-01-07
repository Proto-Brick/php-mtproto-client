<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stats;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Stats\PublicForwards;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stats.getStoryPublicForwards
 */
final class GetStoryPublicForwardsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa6437ef6;
    
    public string $predicate = 'stats.getStoryPublicForwards';
    
    public function getMethodName(): string
    {
        return 'stats.getStoryPublicForwards';
    }
    
    public function getResponseClass(): string
    {
        return PublicForwards::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param string $offset
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly string $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}