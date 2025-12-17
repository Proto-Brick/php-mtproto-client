<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputFileBig
 */
final class InputFileBig extends AbstractInputFile
{
    public const CONSTRUCTOR_ID = 0xfa4f0bb5;
    
    public string $predicate = 'inputFileBig';
    
    /**
     * @param int $id
     * @param int $parts
     * @param string $name
     */
    public function __construct(
        public readonly int $id,
        public readonly int $parts,
        public readonly string $name
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int32($this->parts);
        $buffer .= Serializer::bytes($this->name);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);
        $parts = Deserializer::int32($__payload, $__offset);
        $name = Deserializer::bytes($__payload, $__offset);

        return new self(
            $id,
            $parts,
            $name
        );
    }
}