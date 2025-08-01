<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/poll
 */
final class Poll extends AbstractPoll
{
    public const CONSTRUCTOR_ID = 1484026161;
    
    public string $_ = 'poll';
    
    /**
     * @param int $id
     * @param AbstractTextWithEntities $question
     * @param list<AbstractPollAnswer> $answers
     * @param bool|null $closed
     * @param bool|null $publicVoters
     * @param bool|null $multipleChoice
     * @param bool|null $quiz
     * @param int|null $closePeriod
     * @param int|null $closeDate
     */
    public function __construct(
        public readonly int $id,
        public readonly AbstractTextWithEntities $question,
        public readonly array $answers,
        public readonly ?bool $closed = null,
        public readonly ?bool $publicVoters = null,
        public readonly ?bool $multipleChoice = null,
        public readonly ?bool $quiz = null,
        public readonly ?int $closePeriod = null,
        public readonly ?int $closeDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->closed) $flags |= (1 << 0);
        if ($this->publicVoters) $flags |= (1 << 1);
        if ($this->multipleChoice) $flags |= (1 << 2);
        if ($this->quiz) $flags |= (1 << 3);
        if ($this->closePeriod !== null) $flags |= (1 << 4);
        if ($this->closeDate !== null) $flags |= (1 << 5);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->id);
        $buffer .= $this->question->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->answers);
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->int32($this->closePeriod);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->int32($this->closeDate);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $id = $deserializer->int64($stream);
        $closed = ($flags & (1 << 0)) ? true : null;
        $publicVoters = ($flags & (1 << 1)) ? true : null;
        $multipleChoice = ($flags & (1 << 2)) ? true : null;
        $quiz = ($flags & (1 << 3)) ? true : null;
        $question = AbstractTextWithEntities::deserialize($deserializer, $stream);
        $answers = $deserializer->vectorOfObjects($stream, [AbstractPollAnswer::class, 'deserialize']);
        $closePeriod = ($flags & (1 << 4)) ? $deserializer->int32($stream) : null;
        $closeDate = ($flags & (1 << 5)) ? $deserializer->int32($stream) : null;
            return new self(
            $id,
            $question,
            $answers,
            $closed,
            $publicVoters,
            $multipleChoice,
            $quiz,
            $closePeriod,
            $closeDate
        );
    }
}