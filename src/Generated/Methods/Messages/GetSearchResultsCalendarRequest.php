<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessagesFilter;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SearchResultsCalendar;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getSearchResultsCalendar
 */
final class GetSearchResultsCalendarRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6aa3f6bd;
    
    public string $_ = 'messages.getSearchResultsCalendar';
    
    public function getMethodName(): string
    {
        return 'messages.getSearchResultsCalendar';
    }
    
    public function getResponseClass(): string
    {
        return SearchResultsCalendar::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractMessagesFilter $filter
     * @param int $offsetId
     * @param int $offsetDate
     * @param AbstractInputPeer|null $savedPeerId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractMessagesFilter $filter,
        public readonly int $offsetId,
        public readonly int $offsetDate,
        public readonly ?AbstractInputPeer $savedPeerId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->savedPeerId !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        if ($flags & (1 << 2)) {
            $buffer .= $this->savedPeerId->serialize($serializer);
        }
        $buffer .= $this->filter->serialize($serializer);
        $buffer .= $serializer->int32($this->offsetId);
        $buffer .= $serializer->int32($this->offsetDate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}