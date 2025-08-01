<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSearchResultsCalendarPeriod;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.searchResultsCalendar
 */
final class SearchResultsCalendar extends AbstractSearchResultsCalendar
{
    public const CONSTRUCTOR_ID = 343859772;
    
    public string $_ = 'messages.searchResultsCalendar';
    
    /**
     * @param int $count
     * @param int $minDate
     * @param int $minMsgId
     * @param list<AbstractSearchResultsCalendarPeriod> $periods
     * @param list<AbstractMessage> $messages
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param bool|null $inexact
     * @param int|null $offsetIdOffset
     */
    public function __construct(
        public readonly int $count,
        public readonly int $minDate,
        public readonly int $minMsgId,
        public readonly array $periods,
        public readonly array $messages,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?bool $inexact = null,
        public readonly ?int $offsetIdOffset = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inexact) $flags |= (1 << 0);
        if ($this->offsetIdOffset !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->int32($this->minDate);
        $buffer .= $serializer->int32($this->minMsgId);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->offsetIdOffset);
        }
        $buffer .= $serializer->vectorOfObjects($this->periods);
        $buffer .= $serializer->vectorOfObjects($this->messages);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $inexact = ($flags & (1 << 0)) ? true : null;
        $count = $deserializer->int32($stream);
        $minDate = $deserializer->int32($stream);
        $minMsgId = $deserializer->int32($stream);
        $offsetIdOffset = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $periods = $deserializer->vectorOfObjects($stream, [AbstractSearchResultsCalendarPeriod::class, 'deserialize']);
        $messages = $deserializer->vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $count,
            $minDate,
            $minMsgId,
            $periods,
            $messages,
            $chats,
            $users,
            $inexact,
            $offsetIdOffset
        );
    }
}