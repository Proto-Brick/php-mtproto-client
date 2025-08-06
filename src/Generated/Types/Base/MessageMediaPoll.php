<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaPoll
 */
final class MessageMediaPoll extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0x4bd6e798;
    
    public string $_ = 'messageMediaPoll';
    
    /**
     * @param Poll $poll
     * @param PollResults $results
     */
    public function __construct(
        public readonly Poll $poll,
        public readonly PollResults $results
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->poll->serialize($serializer);
        $buffer .= $this->results->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $poll = Poll::deserialize($deserializer, $stream);
        $results = PollResults::deserialize($deserializer, $stream);
        return new self(
            $poll,
            $results
        );
    }
}