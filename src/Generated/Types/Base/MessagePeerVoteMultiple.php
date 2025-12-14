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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $options = Deserializer::vectorOfStrings($stream);
        $date = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $peer,
            $options,
            $date
        );
    }
}