<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
        if ($this->viaGiveaway) {
            $flags |= (1 << 2);
        }
        if ($this->fromId !== null) {
            $flags |= (1 << 4);
        }
        if ($this->giveawayMsgId !== null) {
            $flags |= (1 << 3);
        }
        if ($this->toId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->usedDate !== null) {
            $flags |= (1 << 1);
        }
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $viaGiveaway = (($flags & (1 << 2)) !== 0) ? true : null;
        $fromId = (($flags & (1 << 4)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $giveawayMsgId = (($flags & (1 << 3)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $toId = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;
        $date = Deserializer::int32($__payload, $__offset);
        $months = Deserializer::int32($__payload, $__offset);
        $usedDate = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

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