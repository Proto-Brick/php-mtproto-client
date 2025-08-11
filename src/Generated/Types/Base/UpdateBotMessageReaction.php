<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotMessageReaction
 */
final class UpdateBotMessageReaction extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xac21d3ce;
    
    public string $_ = 'updateBotMessageReaction';
    
    /**
     * @param AbstractPeer $peer
     * @param int $msgId
     * @param int $date
     * @param AbstractPeer $actor
     * @param list<AbstractReaction> $oldReactions
     * @param list<AbstractReaction> $newReactions
     * @param int $qts
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $msgId,
        public readonly int $date,
        public readonly AbstractPeer $actor,
        public readonly array $oldReactions,
        public readonly array $newReactions,
        public readonly int $qts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int32($this->date);
        $buffer .= $this->actor->serialize();
        $buffer .= Serializer::vectorOfObjects($this->oldReactions);
        $buffer .= Serializer::vectorOfObjects($this->newReactions);
        $buffer .= Serializer::int32($this->qts);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($stream);
        $msgId = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $actor = AbstractPeer::deserialize($stream);
        $oldReactions = Deserializer::vectorOfObjects($stream, [AbstractReaction::class, 'deserialize']);
        $newReactions = Deserializer::vectorOfObjects($stream, [AbstractReaction::class, 'deserialize']);
        $qts = Deserializer::int32($stream);
        return new self(
            $peer,
            $msgId,
            $date,
            $actor,
            $oldReactions,
            $newReactions,
            $qts
        );
    }
}