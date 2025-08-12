<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getUnreadReactions
 */
final class GetUnreadReactionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3223495b;
    
    public string $predicate = 'messages.getUnreadReactions';
    
    public function getMethodName(): string
    {
        return 'messages.getUnreadReactions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $offsetId
     * @param int $addOffset
     * @param int $limit
     * @param int $maxId
     * @param int $minId
     * @param int|null $topMsgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $offsetId,
        public readonly int $addOffset,
        public readonly int $limit,
        public readonly int $maxId,
        public readonly int $minId,
        public readonly ?int $topMsgId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        $buffer .= Serializer::int32($this->offsetId);
        $buffer .= Serializer::int32($this->addOffset);
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::int32($this->maxId);
        $buffer .= Serializer::int32($this->minId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}