<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarsAmount;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarsSubscription;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarsTransaction;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.starsStatus
 */
final class StarsStatus extends AbstractStarsStatus
{
    public const CONSTRUCTOR_ID = 1822222573;
    
    public string $_ = 'payments.starsStatus';
    
    /**
     * @param AbstractStarsAmount $balance
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param list<AbstractStarsSubscription>|null $subscriptions
     * @param string|null $subscriptionsNextOffset
     * @param int|null $subscriptionsMissingBalance
     * @param list<AbstractStarsTransaction>|null $history
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->subscriptions !== null) $flags |= (1 << 1);
        if ($this->subscriptionsNextOffset !== null) $flags |= (1 << 2);
        if ($this->subscriptionsMissingBalance !== null) $flags |= (1 << 4);
        if ($this->history !== null) $flags |= (1 << 3);
        if ($this->nextOffset !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->balance->serialize($serializer);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->subscriptions);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->subscriptionsNextOffset);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int64($this->subscriptionsMissingBalance);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->history);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->nextOffset);
        }
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $balance = AbstractStarsAmount::deserialize($deserializer, $stream);
        $subscriptions = ($flags & (1 << 1)) ? $deserializer->vectorOfObjects($stream, [AbstractStarsSubscription::class, 'deserialize']) : null;
        $subscriptionsNextOffset = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $subscriptionsMissingBalance = ($flags & (1 << 4)) ? $deserializer->int64($stream) : null;
        $history = ($flags & (1 << 3)) ? $deserializer->vectorOfObjects($stream, [AbstractStarsTransaction::class, 'deserialize']) : null;
        $nextOffset = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
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