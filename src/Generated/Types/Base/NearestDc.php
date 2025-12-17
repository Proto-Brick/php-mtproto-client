<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/nearestDc
 */
final class NearestDc extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8e1a1775;
    
    public string $predicate = 'nearestDc';
    
    /**
     * @param string $country
     * @param int $thisDc
     * @param int $nearestDc
     */
    public function __construct(
        public readonly string $country,
        public readonly int $thisDc,
        public readonly int $nearestDc
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->country);
        $buffer .= Serializer::int32($this->thisDc);
        $buffer .= Serializer::int32($this->nearestDc);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $country = Deserializer::bytes($__payload, $__offset);
        $thisDc = Deserializer::int32($__payload, $__offset);
        $nearestDc = Deserializer::int32($__payload, $__offset);

        return new self(
            $country,
            $thisDc,
            $nearestDc
        );
    }
}