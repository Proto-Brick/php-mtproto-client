<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\UserStarGift;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.userStarGifts
 */
final class UserStarGifts extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6b65b517;
    
    public string $predicate = 'payments.userStarGifts';
    
    /**
     * @param int $count
     * @param list<UserStarGift> $gifts
     * @param list<AbstractUser> $users
     * @param string|null $nextOffset
     */
    public function __construct(
        public readonly int $count,
        public readonly array $gifts,
        public readonly array $users,
        public readonly ?string $nextOffset = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nextOffset !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->gifts);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->nextOffset);
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
        $gifts = Deserializer::vectorOfObjects($stream, [UserStarGift::class, 'deserialize']);
        $nextOffset = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $count,
            $gifts,
            $users,
            $nextOffset
        );
    }
}