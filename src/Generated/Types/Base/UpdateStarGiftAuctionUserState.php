<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateStarGiftAuctionUserState
 */
final class UpdateStarGiftAuctionUserState extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xdc58f31e;
    
    public string $predicate = 'updateStarGiftAuctionUserState';
    
    /**
     * @param int $giftId
     * @param StarGiftAuctionUserState $userState
     */
    public function __construct(
        public readonly int $giftId,
        public readonly StarGiftAuctionUserState $userState
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->giftId);
        $buffer .= $this->userState->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $giftId = Deserializer::int64($__payload, $__offset);
        $userState = StarGiftAuctionUserState::deserialize($__payload, $__offset);

        return new self(
            $giftId,
            $userState
        );
    }
}