<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messagePeerVoteMultiple
 */
final class MessagePeerVoteMultiple extends AbstractMessagePeerVote
{
    public const CONSTRUCTOR_ID = 0x4628f6e6;
    
    public string $_ = 'messagePeerVoteMultiple';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->vectorOfStrings($this->options);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $options = $deserializer->vectorOfStrings($stream);
        $date = $deserializer->int32($stream);
        return new self(
            $peer,
            $options,
            $date
        );
    }
}