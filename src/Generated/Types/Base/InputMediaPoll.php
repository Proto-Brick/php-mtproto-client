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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->correctAnswers !== null) $flags |= (1 << 0);
        if ($this->solution !== null) $flags |= (1 << 1);
        if ($this->solutionEntities !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->poll->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfStrings($this->correctAnswers);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->solution);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->solutionEntities);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $poll = Poll::deserialize($deserializer, $stream);
        $correctAnswers = ($flags & (1 << 0)) ? $deserializer->vectorOfStrings($stream) : null;
        $solution = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $solutionEntities = ($flags & (1 << 1)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        return new self(
            $poll,
            $correctAnswers,
            $solution,
            $solutionEntities
        );
    }
}