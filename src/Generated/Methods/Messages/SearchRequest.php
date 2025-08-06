<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessagesFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReaction;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.search
 */
final class SearchRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x29ee847a;
    
    public string $_ = 'messages.search';
    
    public function getMethodName(): string
    {
        return 'messages.search';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $q
     * @param AbstractMessagesFilter $filter
     * @param int $minDate
     * @param int $maxDate
     * @param int $offsetId
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int $hash
     * @param AbstractInputPeer|null $fromId
     * @param AbstractInputPeer|null $savedPeerId
     * @param list<AbstractReaction>|null $savedReaction
     * @param int|null $topMsgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $q,
        public readonly AbstractMessagesFilter $filter,
        public readonly int $minDate,
        public readonly int $maxDate,
        public readonly int $offsetId,
        public readonly int $addOffset,
        public readonly int $limit,
        public readonly int $maxId,
        public readonly int $minId,
        public readonly int $hash,
        public readonly ?AbstractInputPeer $fromId = null,
        public readonly ?AbstractInputPeer $savedPeerId = null,
        public readonly ?array $savedReaction = null,
        public readonly ?int $topMsgId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fromId !== null) $flags |= (1 << 0);
        if ($this->savedPeerId !== null) $flags |= (1 << 2);
        if ($this->savedReaction !== null) $flags |= (1 << 3);
        if ($this->topMsgId !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->q);
        if ($flags & (1 << 0)) {
            $buffer .= $this->fromId->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->savedPeerId->serialize($serializer);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->savedReaction);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->topMsgId);
        }
        $buffer .= $this->filter->serialize($serializer);
        $buffer .= $serializer->int32($this->minDate);
        $buffer .= $serializer->int32($this->maxDate);
        $buffer .= $serializer->int32($this->offsetId);
        $buffer .= $serializer->int32($this->addOffset);
        $buffer .= $serializer->int32($this->limit);
        $buffer .= $serializer->int32($this->maxId);
        $buffer .= $serializer->int32($this->minId);
        $buffer .= $serializer->int64($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}