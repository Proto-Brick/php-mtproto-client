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
    public const CONSTRUCTOR_ID = 1272375192;
    
    public string $_ = 'messageMediaPoll';
    
    /**
     * @param AbstractPoll $poll
     * @param AbstractPollResults $results
     */
    public function __construct(
        public readonly AbstractPoll $poll,
        public readonly AbstractPollResults $results
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
        $poll = AbstractPoll::deserialize($deserializer, $stream);
        $results = AbstractPollResults::deserialize($deserializer, $stream);
            return new self(
            $poll,
            $results
        );
    }
}