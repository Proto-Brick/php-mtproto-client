<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/birthday
 */
final class Birthday extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6c8e1e06;
    
    public string $predicate = 'birthday';
    
    /**
     * @param int $day
     * @param int $month
     * @param int|null $year
     */
    public function __construct(
        public readonly int $day,
        public readonly int $month,
        public readonly ?int $year = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->year !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->day);
        $buffer .= Serializer::int32($this->month);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->year);
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
        $day = Deserializer::int32($__payload, $__offset);
        $month = Deserializer::int32($__payload, $__offset);
        $year = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $day,
            $month,
            $year
        );
    }
}