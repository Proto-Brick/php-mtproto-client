<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messagePeerVoteMultiple
 */
final class MessagePeerVoteMultiple extends AbstractMessagePeerVote
{
    public const CONSTRUCTOR_ID = 0x4628f6e6;
    
    public string $predicate = 'messagePeerVoteMultiple';
    
    /**
     * @param AbstractPeer $peer
     * @param list<string> $options
     * @param int $date
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly array $options,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfStrings($this->options);
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $options = Deserializer::vectorOfStrings($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);

        return new self(
            $peer,
            $options,
            $date
        );
    }
}