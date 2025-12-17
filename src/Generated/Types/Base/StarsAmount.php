<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starsAmount
 */
final class StarsAmount extends AbstractStarsAmount
{
    public const CONSTRUCTOR_ID = 0xbbb6b4a3;
    
    public string $predicate = 'starsAmount';
    
    /**
     * @param int $amount
     * @param int $nanos
     */
    public function __construct(
        public readonly int $amount,
        public readonly int $nanos
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::int32($this->nanos);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $amount = Deserializer::int64($__payload, $__offset);
        $nanos = Deserializer::int32($__payload, $__offset);

        return new self(
            $amount,
            $nanos
        );
    }
}