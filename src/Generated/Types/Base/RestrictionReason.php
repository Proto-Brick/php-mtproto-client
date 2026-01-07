<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/restrictionReason
 */
final class RestrictionReason extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd072acb4;
    
    public string $predicate = 'restrictionReason';
    
    /**
     * @param string $platform
     * @param string $reason
     * @param string $text
     */
    public function __construct(
        public readonly string $platform,
        public readonly string $reason,
        public readonly string $text
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->platform);
        $buffer .= Serializer::bytes($this->reason);
        $buffer .= Serializer::bytes($this->text);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $platform = Deserializer::bytes($__payload, $__offset);
        $reason = Deserializer::bytes($__payload, $__offset);
        $text = Deserializer::bytes($__payload, $__offset);

        return new self(
            $platform,
            $reason,
            $text
        );
    }
}