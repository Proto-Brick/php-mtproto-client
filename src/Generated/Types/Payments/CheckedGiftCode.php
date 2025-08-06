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
    
    public string $_ = 'payments.checkedGiftCode';
    
    /**
     * @param int $date
     * @param int $months
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param bool|null $viaGiveaway
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
        public readonly ?bool $viaGiveaway = null,
        public readonly ?AbstractPeer $fromId = null,
        public readonly ?int $giveawayMsgId = null,
        public readonly ?int $toId = null,
        public readonly ?int $usedDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->viaGiveaway) $flags |= (1 << 2);
        if ($this->fromId !== null) $flags |= (1 << 4);
        if ($this->giveawayMsgId !== null) $flags |= (1 << 3);
        if ($this->toId !== null) $flags |= (1 << 0);
        if ($this->usedDate !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 4)) {
            $buffer .= $this->fromId->serialize($serializer);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->int32($this->giveawayMsgId);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int64($this->toId);
        }
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int32($this->months);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->usedDate);
        }
        $buffer .= $serializer->vectorOfObjects($this->chats);
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

        $viaGiveaway = ($flags & (1 << 2)) ? true : null;
        $fromId = ($flags & (1 << 4)) ? AbstractPeer::deserialize($deserializer, $stream) : null;
        $giveawayMsgId = ($flags & (1 << 3)) ? $deserializer->int32($stream) : null;
        $toId = ($flags & (1 << 0)) ? $deserializer->int64($stream) : null;
        $date = $deserializer->int32($stream);
        $months = $deserializer->int32($stream);
        $usedDate = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
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