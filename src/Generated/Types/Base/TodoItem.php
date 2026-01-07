<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/todoItem
 */
final class TodoItem extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcba9a52f;
    
    public string $predicate = 'todoItem';
    
    /**
     * @param int $id
     * @param TextWithEntities $title
     */
    public function __construct(
        public readonly int $id,
        public readonly TextWithEntities $title
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);
        $buffer .= $this->title->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::int32($__payload, $__offset);
        $title = TextWithEntities::deserialize($__payload, $__offset);

        return new self(
            $id,
            $title
        );
    }
}