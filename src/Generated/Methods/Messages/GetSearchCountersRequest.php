<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessagesFilter;
use DigitalStars\MtprotoClient\Generated\Types\Messages\SearchCounter;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getSearchCounters
 */
final class GetSearchCountersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1bbcf300;
    
    public string $_ = 'messages.getSearchCounters';
    
    public function getMethodName(): string
    {
        return 'messages.getSearchCounters';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . SearchCounter::class . '>';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<AbstractMessagesFilter> $filters
     * @param AbstractInputPeer|null $savedPeerId
     * @param int|null $topMsgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $filters,
        public readonly ?AbstractInputPeer $savedPeerId = null,
        public readonly ?int $topMsgId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->savedPeerId !== null) $flags |= (1 << 2);
        if ($this->topMsgId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        if ($flags & (1 << 2)) {
            $buffer .= $this->savedPeerId->serialize($serializer);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->topMsgId);
        }
        $buffer .= $serializer->vectorOfObjects($this->filters);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}