<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starGiftActiveAuctionState
 */
final class StarGiftActiveAuctionState extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd31bc45d;
    
    public string $predicate = 'starGiftActiveAuctionState';
    
    /**
     * @param AbstractStarGift $gift
     * @param AbstractStarGiftAuctionState $state
     * @param StarGiftAuctionUserState $userState
     */
    public function __construct(
        public readonly AbstractStarGift $gift,
        public readonly AbstractStarGiftAuctionState $state,
        public readonly StarGiftAuctionUserState $userState
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->gift->serialize();
        $buffer .= $this->state->serialize();
        $buffer .= $this->userState->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $gift = AbstractStarGift::deserialize($__payload, $__offset);
        $state = AbstractStarGiftAuctionState::deserialize($__payload, $__offset);
        $userState = StarGiftAuctionUserState::deserialize($__payload, $__offset);

        return new self(
            $gift,
            $state,
            $userState
        );
    }
}