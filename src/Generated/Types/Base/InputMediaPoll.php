<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaPoll
 */
final class InputMediaPoll extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0xf94e5f1;
    
    public string $predicate = 'inputMediaPoll';
    
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
        if ($this->correctAnswers !== null) {
            $flags |= (1 << 0);
        }
        if ($this->solution !== null) {
            $flags |= (1 << 1);
        }
        if ($this->solutionEntities !== null) {
            $flags |= (1 << 1);
        }
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $poll = Poll::deserialize($__payload, $__offset);
        $correctAnswers = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfStrings($__payload, $__offset) : null;
        $solution = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $solutionEntities = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessageEntity::class, 'deserialize']) : null;

        return new self(
            $poll,
            $correctAnswers,
            $solution,
            $solutionEntities
        );
    }
}