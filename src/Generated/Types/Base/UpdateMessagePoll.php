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
    public const CONSTRUCTOR_ID = 2896258427;
    
    public string $_ = 'updateMessagePoll';
    
    /**
     * @param int $pollId
     * @param AbstractPollResults $results
     * @param AbstractPoll|null $poll
     */
    public function __construct(
        public readonly int $pollId,
        public readonly AbstractPollResults $results,
        public readonly ?AbstractPoll $poll = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->poll !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->pollId);
        if ($flags & (1 << 0)) {
            $buffer .= $this->poll->serialize($serializer);
        }
        $buffer .= $this->results->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $pollId = $deserializer->int64($stream);
        $poll = ($flags & (1 << 0)) ? AbstractPoll::deserialize($deserializer, $stream) : null;
        $results = AbstractPollResults::deserialize($deserializer, $stream);
            return new self(
            $pollId,
            $results,
            $poll
        );
    }
}