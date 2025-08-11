<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaPoll
 */
final class InputMediaPoll extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0xf94e5f1;
    
    public string $_ = 'inputMediaPoll';
    
    /**
     * @param Poll $poll
     * @param list<string>|null $correctAnswers
     * @param string|null $solution
     * @param list<AbstractMessageEntity>|null $solutionEntities
     */
    public function __construct(
        public readonly Poll $poll,
        public readonly ?array $correctAnswers = null,
        public readonly ?string $solution = null,
        public readonly ?array $solutionEntities = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->correctAnswers !== null) $flags |= (1 << 0);
        if ($this->solution !== null) $flags |= (1 << 1);
        if ($this->solutionEntities !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->poll->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfStrings($this->correctAnswers);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->solution);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->solutionEntities);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $poll = Poll::deserialize($stream);
        $correctAnswers = ($flags & (1 << 0)) ? Deserializer::vectorOfStrings($stream) : null;
        $solution = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $solutionEntities = ($flags & (1 << 1)) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        return new self(
            $poll,
            $correctAnswers,
            $solution,
            $solutionEntities
        );
    }
}