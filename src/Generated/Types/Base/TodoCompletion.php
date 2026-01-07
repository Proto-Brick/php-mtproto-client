<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/todoCompletion
 */
final class TodoCompletion extends TlObject
{
    public const CONSTRUCTOR_ID = 0x221bb5e4;
    
    public string $predicate = 'todoCompletion';
    
    /**
     * @param int $id
     * @param AbstractPeer $completedBy
     * @param int $date
     */
    public function __construct(
        public readonly int $id,
        public readonly AbstractPeer $completedBy,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->id);
        $buffer .= $this->completedBy->serialize();
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::int32($__payload, $__offset);
        $completedBy = AbstractPeer::deserialize($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);

        return new self(
            $id,
            $completedBy,
            $date
        );
    }
}