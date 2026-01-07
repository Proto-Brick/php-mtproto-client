<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStarGiftAuctionState;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarGiftAuctionUserState;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/payments.starGiftAuctionState
 */
final class StarGiftAuctionState extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6b39f4ec;
    
    public string $predicate = 'payments.starGiftAuctionState';
    
    /**
     * @param AbstractStarGift $gift
     * @param AbstractStarGiftAuctionState $state
     * @param StarGiftAuctionUserState $userState
     * @param int $timeout
     * @param list<AbstractUser> $users
     * @param list<AbstractChat> $chats
     */
    public function __construct(
        public readonly AbstractStarGift $gift,
        public readonly AbstractStarGiftAuctionState $state,
        public readonly StarGiftAuctionUserState $userState,
        public readonly int $timeout,
        public readonly array $users,
        public readonly array $chats
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->gift->serialize();
        $buffer .= $this->state->serialize();
        $buffer .= $this->userState->serialize();
        $buffer .= Serializer::int32($this->timeout);
        $buffer .= Serializer::vectorOfObjects($this->users);
        $buffer .= Serializer::vectorOfObjects($this->chats);
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
        $timeout = Deserializer::int32($__payload, $__offset);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);

        return new self(
            $gift,
            $state,
            $userState,
            $timeout,
            $users,
            $chats
        );
    }
}