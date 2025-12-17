<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateStarsRevenueStatus
 */
final class UpdateStarsRevenueStatus extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xa584b019;
    
    public string $predicate = 'updateStarsRevenueStatus';
    
    /**
     * @param AbstractPeer $peer
     * @param StarsRevenueStatus $status
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly StarsRevenueStatus $status
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->status->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $status = StarsRevenueStatus::deserialize($__payload, $__offset);

        return new self(
            $peer,
            $status
        );
    }
}