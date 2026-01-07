<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Premium;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Premium\MyBoosts;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/premium.applyBoost
 */
final class ApplyBoostRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6b7da746;
    
    public string $predicate = 'premium.applyBoost';
    
    public function getMethodName(): string
    {
        return 'premium.applyBoost';
    }
    
    public function getResponseClass(): string
    {
        return MyBoosts::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int>|null $slots
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?array $slots = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->slots !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfInts($this->slots);
        }
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}