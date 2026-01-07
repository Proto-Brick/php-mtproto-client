<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/searchPostsFlood
 */
final class SearchPostsFlood extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3e0b5b6a;
    
    public string $predicate = 'searchPostsFlood';
    
    /**
     * @param int $totalDaily
     * @param int $remains
     * @param int $starsAmount
     * @param true|null $queryIsFree
     * @param int|null $waitTill
     */
    public function __construct(
        public readonly int $totalDaily,
        public readonly int $remains,
        public readonly int $starsAmount,
        public readonly ?true $queryIsFree = null,
        public readonly ?int $waitTill = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->queryIsFree) {
            $flags |= (1 << 0);
        }
        if ($this->waitTill !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->totalDaily);
        $buffer .= Serializer::int32($this->remains);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->waitTill);
        }
        $buffer .= Serializer::int64($this->starsAmount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $queryIsFree = (($flags & (1 << 0)) !== 0) ? true : null;
        $totalDaily = Deserializer::int32($__payload, $__offset);
        $remains = Deserializer::int32($__payload, $__offset);
        $waitTill = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $starsAmount = Deserializer::int64($__payload, $__offset);

        return new self(
            $totalDaily,
            $remains,
            $starsAmount,
            $queryIsFree,
            $waitTill
        );
    }
}