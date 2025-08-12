<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/poll
 */
final class Poll extends TlObject
{
    public const CONSTRUCTOR_ID = 0x58747131;
    
    public string $predicate = 'poll';
    
    /**
     * @param int $id
     * @param TextWithEntities $question
     * @param list<PollAnswer> $answers
     * @param true|null $closed
     * @param true|null $publicVoters
     * @param true|null $multipleChoice
     * @param true|null $quiz
     * @param int|null $closePeriod
     * @param int|null $closeDate
     */
    public function __construct(
        public readonly int $id,
        public readonly TextWithEntities $question,
        public readonly array $answers,
        public readonly ?true $closed = null,
        public readonly ?true $publicVoters = null,
        public readonly ?true $multipleChoice = null,
        public readonly ?true $quiz = null,
        public readonly ?int $closePeriod = null,
        public readonly ?int $closeDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->closed) $flags |= (1 << 0);
        if ($this->publicVoters) $flags |= (1 << 1);
        if ($this->multipleChoice) $flags |= (1 << 2);
        if ($this->quiz) $flags |= (1 << 3);
        if ($this->closePeriod !== null) $flags |= (1 << 4);
        if ($this->closeDate !== null) $flags |= (1 << 5);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->question->serialize();
        $buffer .= Serializer::vectorOfObjects($this->answers);
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->closePeriod);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int32($this->closeDate);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::int64($stream);
        $flags = Deserializer::int32($stream);
        $closed = ($flags & (1 << 0)) ? true : null;
        $publicVoters = ($flags & (1 << 1)) ? true : null;
        $multipleChoice = ($flags & (1 << 2)) ? true : null;
        $quiz = ($flags & (1 << 3)) ? true : null;
        $question = TextWithEntities::deserialize($stream);
        $answers = Deserializer::vectorOfObjects($stream, [PollAnswer::class, 'deserialize']);
        $closePeriod = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;
        $closeDate = ($flags & (1 << 5)) ? Deserializer::int32($stream) : null;

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