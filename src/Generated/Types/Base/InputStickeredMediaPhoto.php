<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStickeredMediaPhoto
 */
final class InputStickeredMediaPhoto extends AbstractInputStickeredMedia
{
    public const CONSTRUCTOR_ID = 0x4a992157;
    
    public string $predicate = 'inputStickeredMediaPhoto';
    
    /**
     * @param AbstractInputPhoto $id
     */
    public function __construct(
        public readonly AbstractInputPhoto $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $id = AbstractInputPhoto::deserialize($__payload, $__offset);

        return new self(
            $id
        );
    }
}