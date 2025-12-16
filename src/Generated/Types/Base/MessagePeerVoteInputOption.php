<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messagePeerVoteInputOption
 */
final class MessagePeerVoteInputOption extends AbstractMessagePeerVote
{
    public const CONSTRUCTOR_ID = 0x74cda504;
    
    public string $predicate = 'messagePeerVoteInputOption';
    
    /**
     * @param AbstractPeer $peer
     * @param int $date
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $date = Deserializer::int32($stream);

        return new self(
            $peer,
            $date
        );
    }
}