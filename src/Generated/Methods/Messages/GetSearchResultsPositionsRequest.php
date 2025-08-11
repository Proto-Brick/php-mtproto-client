<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessagesFilter;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SearchResultsPositions;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getSearchResultsPositions
 */
final class GetSearchResultsPositionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9c7f2f10;
    
    public string $_ = 'messages.getSearchResultsPositions';
    
    public function getMethodName(): string
    {
        return 'messages.getSearchResultsPositions';
    }
    
    public function getResponseClass(): string
    {
        return SearchResultsPositions::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractMessagesFilter $filter
     * @param int $offsetId
     * @param int $limit
     * @param AbstractInputPeer|null $savedPeerId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractMessagesFilter $filter,
        public readonly int $offsetId,
        public readonly int $limit,
        public readonly ?AbstractInputPeer $savedPeerId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->savedPeerId !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= $this->savedPeerId->serialize();
        }
        $buffer .= $this->filter->serialize();
        $buffer .= Serializer::int32($this->offsetId);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}