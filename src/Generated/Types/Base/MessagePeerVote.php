<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messagePeerVote
 */
final class MessagePeerVote extends AbstractMessagePeerVote
{
    public const CONSTRUCTOR_ID = 0xb6cc2d5c;
    
    public string $predicate = 'messagePeerVote';
    
    /**
     * @param AbstractPeer $peer
     * @param string $option
     * @param int $date
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly string $option,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->option);
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $option = Deserializer::bytes($stream);
        $date = Deserializer::int32($stream);

        return new self(
            $peer,
            $option,
            $date
        );
    }
}