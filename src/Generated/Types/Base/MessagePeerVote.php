<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messagePeerVote
 */
final class MessagePeerVote extends AbstractMessagePeerVote
{
    public const CONSTRUCTOR_ID = 3066834268;
    
    public string $_ = 'messagePeerVote';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->option);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $option = $deserializer->bytes($stream);
        $date = $deserializer->int32($stream);
            return new self(
            $peer,
            $option,
            $date
        );
    }
}