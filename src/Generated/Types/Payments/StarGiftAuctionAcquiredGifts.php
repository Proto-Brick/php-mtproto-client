<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarGiftAuctionAcquiredGift;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/payments.starGiftAuctionAcquiredGifts
 */
final class StarGiftAuctionAcquiredGifts extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7d5bd1f0;
    
    public string $predicate = 'payments.starGiftAuctionAcquiredGifts';
    
    /**
     * @param list<StarGiftAuctionAcquiredGift> $gifts
     * @param list<AbstractUser> $users
     * @param list<AbstractChat> $chats
     */
    public function __construct(
        public readonly array $gifts,
        public readonly array $users,
        public readonly array $chats
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->gifts);
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
        $gifts = Deserializer::vectorOfObjects($__payload, $__offset, [StarGiftAuctionAcquiredGift::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);

        return new self(
            $gifts,
            $users,
            $chats
        );
    }
}