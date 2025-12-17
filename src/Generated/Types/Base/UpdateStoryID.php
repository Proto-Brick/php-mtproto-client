<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateStoryID
 */
final class UpdateStoryID extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x1bf335b9;
    
    public string $predicate = 'updateStoryID';
    
    /**
     * @param int $id
     * @param int $randomId
     */
    public function __construct(
        public readonly int $id,
        public readonly int $randomId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::int64($this->randomId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $id = Deserializer::int32($__payload, $__offset);
        $randomId = Deserializer::int64($__payload, $__offset);

        return new self(
            $id,
            $randomId
        );
    }
}