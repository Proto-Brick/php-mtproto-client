<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarGift;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarGiftAttribute;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarGiftAttributeCounter;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.resaleStarGifts
 */
final class ResaleStarGifts extends TlObject
{
    public const CONSTRUCTOR_ID = 0x947a12df;
    
    public string $predicate = 'payments.resaleStarGifts';
    
    /**
     * @param int $count
     * @param list<AbstractStarGift> $gifts
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param string|null $nextOffset
     * @param list<AbstractStarGiftAttribute>|null $attributes
     * @param int|null $attributesHash
     * @param list<StarGiftAttributeCounter>|null $counters
     */
    public function __construct(
        public readonly int $count,
        public readonly array $gifts,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?string $nextOffset = null,
        public readonly ?array $attributes = null,
        public readonly ?int $attributesHash = null,
        public readonly ?array $counters = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nextOffset !== null) $flags |= (1 << 0);
        if ($this->attributes !== null) $flags |= (1 << 1);
        if ($this->attributesHash !== null) $flags |= (1 << 1);
        if ($this->counters !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->gifts);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->nextOffset);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->attributes);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int64($this->attributesHash);
        }
        $buffer .= Serializer::vectorOfObjects($this->chats);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::vectorOfObjects($this->counters);
        }
        $buffer .= Serializer::vectorOfObjects($this->users);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $count = Deserializer::int32($stream);
        $gifts = Deserializer::vectorOfObjects($stream, [AbstractStarGift::class, 'deserialize']);
        $nextOffset = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $attributes = ($flags & (1 << 1)) ? Deserializer::vectorOfObjects($stream, [AbstractStarGiftAttribute::class, 'deserialize']) : null;
        $attributesHash = ($flags & (1 << 1)) ? Deserializer::int64($stream) : null;
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $counters = ($flags & (1 << 2)) ? Deserializer::vectorOfObjects($stream, [StarGiftAttributeCounter::class, 'deserialize']) : null;
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $count,
            $gifts,
            $chats,
            $users,
            $nextOffset,
            $attributes,
            $attributesHash,
            $counters
        );
    }
}