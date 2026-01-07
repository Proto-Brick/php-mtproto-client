<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/statsAbsValueAndPrev
 */
final class StatsAbsValueAndPrev extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcb43acde;
    
    public string $predicate = 'statsAbsValueAndPrev';
    
    /**
     * @param float $current
     * @param float $previous
     */
    public function __construct(
        public readonly float $current,
        public readonly float $previous
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= pack('d', $this->current);
        $buffer .= pack('d', $this->previous);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $current = Deserializer::double($__payload, $__offset);
        $previous = Deserializer::double($__payload, $__offset);

        return new self(
            $current,
            $previous
        );
    }
}