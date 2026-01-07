<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Premium;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Premium\BoostsList;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/premium.getBoostsList
 */
final class GetBoostsListRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x60f67660;
    
    public string $predicate = 'premium.getBoostsList';
    
    public function getMethodName(): string
    {
        return 'premium.getBoostsList';
    }
    
    public function getResponseClass(): string
    {
        return BoostsList::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $offset
     * @param int $limit
     * @param true|null $gifts
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $offset,
        public readonly int $limit,
        public readonly ?true $gifts = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->gifts) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}