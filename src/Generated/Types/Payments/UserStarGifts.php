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
    
    public string $_ = 'payments.userStarGifts';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nextOffset !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->vectorOfObjects($this->gifts);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->nextOffset);
        }
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $count = $deserializer->int32($stream);
        $gifts = $deserializer->vectorOfObjects($stream, [UserStarGift::class, 'deserialize']);
        $nextOffset = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $count,
            $gifts,
            $users,
            $nextOffset
        );
    }
}