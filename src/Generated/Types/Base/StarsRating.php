<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starsRating
 */
final class StarsRating extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1b0e4f07;
    
    public string $predicate = 'starsRating';
    
    /**
     * @param int $level
     * @param int $currentLevelStars
     * @param int $stars
     * @param int|null $nextLevelStars
     */
    public function __construct(
        public readonly int $level,
        public readonly int $currentLevelStars,
        public readonly int $stars,
        public readonly ?int $nextLevelStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nextLevelStars !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->level);
        $buffer .= Serializer::int64($this->currentLevelStars);
        $buffer .= Serializer::int64($this->stars);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->nextLevelStars);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $level = Deserializer::int32($__payload, $__offset);
        $currentLevelStars = Deserializer::int64($__payload, $__offset);
        $stars = Deserializer::int64($__payload, $__offset);
        $nextLevelStars = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;

        return new self(
            $level,
            $currentLevelStars,
            $stars,
            $nextLevelStars
        );
    }
}