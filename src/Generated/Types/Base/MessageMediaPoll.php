<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaPoll
 */
final class MessageMediaPoll extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0x4bd6e798;
    
    public string $predicate = 'messageMediaPoll';
    
    /**
     * @param Poll $poll
     * @param PollResults $results
     */
    public function __construct(
        public readonly Poll $poll,
        public readonly PollResults $results
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->poll->serialize();
        $buffer .= $this->results->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $poll = Poll::deserialize($stream);
        $results = PollResults::deserialize($stream);

        return new self(
            $poll,
            $results
        );
    }
}