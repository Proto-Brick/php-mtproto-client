<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateStarGiftAuctionState
 */
final class UpdateStarGiftAuctionState extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x48e246c2;
    
    public string $predicate = 'updateStarGiftAuctionState';
    
    /**
     * @param int $giftId
     * @param AbstractStarGiftAuctionState $state
     */
    public function __construct(
        public readonly int $giftId,
        public readonly AbstractStarGiftAuctionState $state
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->giftId);
        $buffer .= $this->state->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $giftId = Deserializer::int64($__payload, $__offset);
        $state = AbstractStarGiftAuctionState::deserialize($__payload, $__offset);

        return new self(
            $giftId,
            $state
        );
    }
}