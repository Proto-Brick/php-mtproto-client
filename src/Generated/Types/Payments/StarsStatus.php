<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStarsAmount;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarsSubscription;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarsTransaction;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/payments.starsStatus
 */
final class StarsStatus extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6c9ce8ed;
    
    public string $predicate = 'payments.starsStatus';
    
    /**
     * @param AbstractStarsAmount $balance
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param list<StarsSubscription>|null $subscriptions
     * @param string|null $subscriptionsNextOffset
     * @param int|null $subscriptionsMissingBalance
     * @param list<StarsTransaction>|null $history
     * @param string|null $nextOffset
     */
    public function __construct(
        public readonly AbstractStarsAmount $balance,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?array $subscriptions = null,
        public readonly ?string $subscriptionsNextOffset = null,
        public readonly ?int $subscriptionsMissingBalance = null,
        public readonly ?array $history = null,
        public readonly ?string $nextOffset = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->subscriptions !== null) {
            $flags |= (1 << 1);
        }
        if ($this->subscriptionsNextOffset !== null) {
            $flags |= (1 << 2);
        }
        if ($this->subscriptionsMissingBalance !== null) {
            $flags |= (1 << 4);
        }
        if ($this->history !== null) {
            $flags |= (1 << 3);
        }
        if ($this->nextOffset !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->balance->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->subscriptions);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->subscriptionsNextOffset);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int64($this->subscriptionsMissingBalance);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->history);
        }
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
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $balance = AbstractStarsAmount::deserialize($stream);
        $subscriptions = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfObjects($stream, [StarsSubscription::class, 'deserialize']) : null;
        $subscriptionsNextOffset = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($stream) : null;
        $subscriptionsMissingBalance = (($flags & (1 << 4)) !== 0) ? Deserializer::int64($stream) : null;
        $history = (($flags & (1 << 3)) !== 0) ? Deserializer::vectorOfObjects($stream, [StarsTransaction::class, 'deserialize']) : null;
        $nextOffset = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $balance,
            $chats,
            $users,
            $subscriptions,
            $subscriptionsNextOffset,
            $subscriptionsMissingBalance,
            $history,
            $nextOffset
        );
    }
}