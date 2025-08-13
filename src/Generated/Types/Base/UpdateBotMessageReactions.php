<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotMessageReactions
 */
final class UpdateBotMessageReactions extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x9cb7759;
    
    public string $predicate = 'updateBotMessageReactions';
    
    /**
     * @param AbstractPeer $peer
     * @param int $msgId
     * @param int $date
     * @param list<ReactionCount> $reactions
     * @param int $qts
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $msgId,
        public readonly int $date,
        public readonly array $reactions,
        public readonly int $qts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::vectorOfObjects($this->reactions);
        $buffer .= Serializer::int32($this->qts);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $msgId = Deserializer::int32($stream);
        $date = Deserializer::int32($stream);
        $reactions = Deserializer::vectorOfObjects($stream, [ReactionCount::class, 'deserialize']);
        $qts = Deserializer::int32($stream);

        return new self(
            $peer,
            $msgId,
            $date,
            $reactions,
            $qts
        );
    }
}