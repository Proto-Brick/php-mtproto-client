<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pollResults
 */
final class PollResults extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7adf2420;
    
    public string $_ = 'pollResults';
    
    /**
     * @param bool|null $min
     * @param list<PollAnswerVoters>|null $results
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->min) $flags |= (1 << 0);
        if ($this->results !== null) $flags |= (1 << 1);
        if ($this->totalVoters !== null) $flags |= (1 << 2);
        if ($this->recentVoters !== null) $flags |= (1 << 3);
        if ($this->solution !== null) $flags |= (1 << 4);
        if ($this->solutionEntities !== null) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->results);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->totalVoters);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->recentVoters);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::bytes($this->solution);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::vectorOfObjects($this->solutionEntities);
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

        $min = ($flags & (1 << 0)) ? true : null;
        $results = ($flags & (1 << 1)) ? Deserializer::vectorOfObjects($stream, [PollAnswerVoters::class, 'deserialize']) : null;
        $totalVoters = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
        $recentVoters = ($flags & (1 << 3)) ? Deserializer::vectorOfObjects($stream, [AbstractPeer::class, 'deserialize']) : null;
        $solution = ($flags & (1 << 4)) ? Deserializer::bytes($stream) : null;
        $solutionEntities = ($flags & (1 << 4)) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
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