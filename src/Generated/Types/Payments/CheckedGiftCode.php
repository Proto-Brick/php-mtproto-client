<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.checkedGiftCode
 */
final class CheckedGiftCode extends TlObject
{
    public const CONSTRUCTOR_ID = 0x284a1096;
    
    public string $predicate = 'payments.checkedGiftCode';
    
    /**
     * @param int $date
     * @param int $months
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param true|null $viaGiveaway
     * @param AbstractPeer|null $fromId
     * @param int|null $giveawayMsgId
     * @param int|null $toId
     * @param int|null $usedDate
     */
    public function __construct(
        public readonly int $date,
        public readonly int $months,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?true $viaGiveaway = null,
        public readonly ?AbstractPeer $fromId = null,
        public readonly ?int $giveawayMsgId = null,
        public readonly ?int $toId = null,
        public readonly ?int $usedDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaGiveaway) $flags |= (1 << 2);
        if ($this->fromId !== null) $flags |= (1 << 4);
        if ($this->giveawayMsgId !== null) $flags |= (1 << 3);
        if ($this->toId !== null) $flags |= (1 << 0);
        if ($this->usedDate !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 4)) {
            $buffer .= $this->fromId->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->giveawayMsgId);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->toId);
        }
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->months);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->usedDate);
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
        $viaGiveaway = ($flags & (1 << 2)) ? true : null;
        $fromId = ($flags & (1 << 4)) ? AbstractPeer::deserialize($stream) : null;
        $giveawayMsgId = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;
        $toId = ($flags & (1 << 0)) ? Deserializer::int64($stream) : null;
        $date = Deserializer::int32($stream);
        $months = Deserializer::int32($stream);
        $usedDate = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $date,
            $months,
            $chats,
            $users,
            $viaGiveaway,
            $fromId,
            $giveawayMsgId,
            $toId,
            $usedDate
        );
    }
}