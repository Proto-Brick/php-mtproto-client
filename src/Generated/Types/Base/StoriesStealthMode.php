<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/storiesStealthMode
 */
final class StoriesStealthMode extends TlObject
{
    public const CONSTRUCTOR_ID = 0x712e27fd;
    
    public string $predicate = 'storiesStealthMode';
    
    /**
     * @param int|null $activeUntilDate
     * @param int|null $cooldownUntilDate
     */
    public function __construct(
        public readonly ?int $activeUntilDate = null,
        public readonly ?int $cooldownUntilDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->activeUntilDate !== null) {
            $flags |= (1 << 0);
        }
        if ($this->cooldownUntilDate !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->activeUntilDate);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->cooldownUntilDate);
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
        $activeUntilDate = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $cooldownUntilDate = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $activeUntilDate,
            $cooldownUntilDate
        );
    }
}