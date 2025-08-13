<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessagesFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SearchResultsCalendar;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getSearchResultsCalendar
 */
final class GetSearchResultsCalendarRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6aa3f6bd;
    
    public string $predicate = 'messages.getSearchResultsCalendar';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->savedPeerId !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= $this->savedPeerId->serialize();
        }
        $buffer .= $this->filter->serialize();
        $buffer .= Serializer::int32($this->offsetId);
        $buffer .= Serializer::int32($this->offsetDate);
        return $buffer;
    }
}