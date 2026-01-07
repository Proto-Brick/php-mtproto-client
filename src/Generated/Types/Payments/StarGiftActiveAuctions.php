<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarGiftActiveAuctionState;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/payments.starGiftActiveAuctions
 */
final class StarGiftActiveAuctions extends AbstractStarGiftActiveAuctions
{
    public const CONSTRUCTOR_ID = 0xaef6abbc;
    
    public string $predicate = 'payments.starGiftActiveAuctions';
    
    /**
     * @param list<StarGiftActiveAuctionState> $auctions
     * @param list<AbstractUser> $users
     * @param list<AbstractChat> $chats
     */
    public function __construct(
        public readonly array $auctions,
        public readonly array $users,
        public readonly array $chats
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->auctions);
        $buffer .= Serializer::vectorOfObjects($this->users);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $auctions = Deserializer::vectorOfObjects($__payload, $__offset, [StarGiftActiveAuctionState::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);

        return new self(
            $auctions,
            $users,
            $chats
        );
    }
}