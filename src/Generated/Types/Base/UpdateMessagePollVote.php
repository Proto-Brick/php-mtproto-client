<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateMessagePollVote
 */
final class UpdateMessagePollVote extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x24f40e77;
    
    public string $predicate = 'updateMessagePollVote';
    
    /**
     * @param int $pollId
     * @param AbstractPeer $peer
     * @param list<string> $options
     * @param int $qts
     */
    public function __construct(
        public readonly int $pollId,
        public readonly AbstractPeer $peer,
        public readonly array $options,
        public readonly int $qts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->pollId);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfStrings($this->options);
        $buffer .= Serializer::int32($this->qts);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $pollId = Deserializer::int64($stream);
        $peer = AbstractPeer::deserialize($stream);
        $options = Deserializer::vectorOfStrings($stream);
        $qts = Deserializer::int32($stream);

        return new self(
            $pollId,
            $peer,
            $options,
            $qts
        );
    }
}