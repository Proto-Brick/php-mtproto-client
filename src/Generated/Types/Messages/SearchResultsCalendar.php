<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\SearchResultsCalendarPeriod;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.searchResultsCalendar
 */
final class SearchResultsCalendar extends TlObject
{
    public const CONSTRUCTOR_ID = 0x147ee23c;
    
    public string $predicate = 'messages.searchResultsCalendar';
    
    /**
     * @param int $count
     * @param int $minDate
     * @param int $minMsgId
     * @param list<SearchResultsCalendarPeriod> $periods
     * @param list<AbstractMessage> $messages
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param true|null $inexact
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
        public readonly ?true $inexact = null,
        public readonly ?int $offsetIdOffset = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inexact) $flags |= (1 << 0);
        if ($this->offsetIdOffset !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::int32($this->minDate);
        $buffer .= Serializer::int32($this->minMsgId);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->offsetIdOffset);
        }
        $buffer .= Serializer::vectorOfObjects($this->periods);
        $buffer .= Serializer::vectorOfObjects($this->messages);
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
        $inexact = ($flags & (1 << 0)) ? true : null;
        $count = Deserializer::int32($stream);
        $minDate = Deserializer::int32($stream);
        $minMsgId = Deserializer::int32($stream);
        $offsetIdOffset = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $periods = Deserializer::vectorOfObjects($stream, [SearchResultsCalendarPeriod::class, 'deserialize']);
        $messages = Deserializer::vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

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