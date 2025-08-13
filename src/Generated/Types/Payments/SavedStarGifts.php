<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\SavedStarGift;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.savedStarGifts
 */
final class SavedStarGifts extends TlObject
{
    public const CONSTRUCTOR_ID = 0x95f389b1;
    
    public string $predicate = 'payments.savedStarGifts';
    
    /**
     * @param int $count
     * @param list<SavedStarGift> $gifts
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param bool|null $chatNotificationsEnabled
     * @param string|null $nextOffset
     */
    public function __construct(
        public readonly int $count,
        public readonly array $gifts,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?bool $chatNotificationsEnabled = null,
        public readonly ?string $nextOffset = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->chatNotificationsEnabled !== null) $flags |= (1 << 1);
        if ($this->nextOffset !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->count);
        if ($flags & (1 << 1)) {
            $buffer .= ($this->chatNotificationsEnabled ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        $buffer .= Serializer::vectorOfObjects($this->gifts);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->nextOffset);
        }
        $buffer .= Serializer::vectorOfObjects($this->chats);
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
        $chatNotificationsEnabled = ($flags & (1 << 1)) ? (Deserializer::int32($stream) === 0x997275b5) : null;
        $gifts = Deserializer::vectorOfObjects($stream, [SavedStarGift::class, 'deserialize']);
        $nextOffset = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $count,
            $gifts,
            $chats,
            $users,
            $chatNotificationsEnabled,
            $nextOffset
        );
    }
}