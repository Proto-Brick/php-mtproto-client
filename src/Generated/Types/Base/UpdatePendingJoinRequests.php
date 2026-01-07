<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatePendingJoinRequests
 */
final class UpdatePendingJoinRequests extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x7063c3db;
    
    public string $predicate = 'updatePendingJoinRequests';
    
    /**
     * @param AbstractPeer $peer
     * @param int $requestsPending
     * @param list<int> $recentRequesters
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $requestsPending,
        public readonly array $recentRequesters
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->requestsPending);
        $buffer .= Serializer::vectorOfLongs($this->recentRequesters);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $requestsPending = Deserializer::int32($__payload, $__offset);
        $recentRequesters = Deserializer::vectorOfLongs($__payload, $__offset);

        return new self(
            $peer,
            $requestsPending,
            $recentRequesters
        );
    }
}