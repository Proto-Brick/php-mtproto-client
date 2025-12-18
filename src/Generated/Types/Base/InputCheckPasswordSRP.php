<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputCheckPasswordSRP
 */
final class InputCheckPasswordSRP extends AbstractInputCheckPasswordSRP
{
    public const CONSTRUCTOR_ID = 0xd27ff082;
    
    public string $predicate = 'inputCheckPasswordSRP';
    
    /**
     * @param int $srpId
     * @param string $a
     * @param string $m1
     */
    public function __construct(
        public readonly int $srpId,
        public readonly string $a,
        public readonly string $m1
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->srpId);
        $buffer .= Serializer::bytes($this->a);
        $buffer .= Serializer::bytes($this->m1);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $srpId = Deserializer::int64($__payload, $__offset);
        $a = Deserializer::bytes($__payload, $__offset);
        $m1 = Deserializer::bytes($__payload, $__offset);

        return new self(
            $srpId,
            $a,
            $m1
        );
    }
}