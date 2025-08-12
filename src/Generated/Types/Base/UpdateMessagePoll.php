<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateMessagePoll
 */
final class UpdateMessagePoll extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xaca1657b;
    
    public string $predicate = 'updateMessagePoll';
    
    /**
     * @param int $pollId
     * @param PollResults $results
     * @param Poll|null $poll
     */
    public function __construct(
        public readonly int $pollId,
        public readonly PollResults $results,
        public readonly ?Poll $poll = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->poll !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->pollId);
        if ($flags & (1 << 0)) {
            $buffer .= $this->poll->serialize();
        }
        $buffer .= $this->results->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $pollId = Deserializer::int64($stream);
        $poll = ($flags & (1 << 0)) ? Poll::deserialize($stream) : null;
        $results = PollResults::deserialize($stream);

        return new self(
            $pollId,
            $results,
            $poll
        );
    }
}