<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getHistory
 */
final class GetHistoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4423e6c5;
    
    public string $_ = 'messages.getHistory';
    
    public function getMethodName(): string
    {
        return 'messages.getHistory';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $offsetId
     * @param int $offsetDate
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int $hash
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $offsetId,
        public readonly int $offsetDate,
        public readonly int $addOffset,
        public readonly int $limit,
        public readonly int $maxId,
        public readonly int $minId,
        public readonly int $hash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->offsetId);
        $buffer .= $serializer->int32($this->offsetDate);
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