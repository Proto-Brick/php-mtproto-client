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
    
    public string $_ = 'poll';
    
    /**
     * @param int $id
     * @param TextWithEntities $question
     * @param list<PollAnswer> $answers
     * @param bool|null $closed
     * @param bool|null $publicVoters
     * @param bool|null $multipleChoice
     * @param bool|null $quiz
     * @param int|null $closePeriod
     * @param int|null $closeDate
     */
    public function __construct(
        public readonly int $id,
        public readonly TextWithEntities $question,
        public readonly array $answers,
        public readonly ?bool $closed = null,
        public readonly ?bool $publicVoters = null,
        public readonly ?bool $multipleChoice = null,
        public readonly ?bool $quiz = null,
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
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->id);
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
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $id = Deserializer::int64($stream);
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