<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateMessagePollVote
 */
final class UpdateMessagePollVote extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x24f40e77;
    
    public string $_ = 'updateMessagePollVote';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->pollId);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->vectorOfStrings($this->options);
        $buffer .= $serializer->int32($this->qts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $pollId = $deserializer->int64($stream);
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $options = $deserializer->vectorOfStrings($stream);
        $qts = $deserializer->int32($stream);
        return new self(
            $pollId,
            $peer,
            $options,
            $qts
        );
    }
}