<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStarGift;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/payments.starGifts
 */
final class StarGifts extends AbstractStarGifts
{
    public const CONSTRUCTOR_ID = 0x2ed82995;
    
    public string $predicate = 'payments.starGifts';
    
    /**
     * @param int $hash
     * @param list<AbstractStarGift> $gifts
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $gifts,
        public readonly array $chats,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->gifts);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $hash = Deserializer::int32($__payload, $__offset);
        $gifts = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractStarGift::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $hash,
            $gifts,
            $chats,
            $users
        );
    }
}