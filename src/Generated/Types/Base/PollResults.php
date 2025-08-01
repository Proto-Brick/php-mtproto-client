<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pollResults
 */
final class PollResults extends AbstractPollResults
{
    public const CONSTRUCTOR_ID = 2061444128;
    
    public string $_ = 'pollResults';
    
    /**
     * @param bool|null $min
     * @param list<AbstractPollAnswerVoters>|null $results
     * @param int|null $totalVoters
     * @param list<AbstractPeer>|null $recentVoters
     * @param string|null $solution
     * @param list<AbstractMessageEntity>|null $solutionEntities
     */
    public function __construct(
        public readonly ?bool $min = null,
        public readonly ?array $results = null,
        public readonly ?int $totalVoters = null,
        public readonly ?array $recentVoters = null,
        public readonly ?string $solution = null,
        public readonly ?array $solutionEntities = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->min) $flags |= (1 << 0);
        if ($this->results !== null) $flags |= (1 << 1);
        if ($this->totalVoters !== null) $flags |= (1 << 2);
        if ($this->recentVoters !== null) $flags |= (1 << 3);
        if ($this->solution !== null) $flags |= (1 << 4);
        if ($this->solutionEntities !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->results);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int32($this->totalVoters);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->recentVoters);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->bytes($this->solution);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->vectorOfObjects($this->solutionEntities);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $min = ($flags & (1 << 0)) ? true : null;
        $results = ($flags & (1 << 1)) ? $deserializer->vectorOfObjects($stream, [AbstractPollAnswerVoters::class, 'deserialize']) : null;
        $totalVoters = ($flags & (1 << 2)) ? $deserializer->int32($stream) : null;
        $recentVoters = ($flags & (1 << 3)) ? $deserializer->vectorOfObjects($stream, [AbstractPeer::class, 'deserialize']) : null;
        $solution = ($flags & (1 << 4)) ? $deserializer->bytes($stream) : null;
        $solutionEntities = ($flags & (1 << 4)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
            return new self(
            $min,
            $results,
            $totalVoters,
            $recentVoters,
            $solution,
            $solutionEntities
        );
    }
}