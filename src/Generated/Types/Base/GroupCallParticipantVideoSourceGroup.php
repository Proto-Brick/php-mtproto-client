<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/groupCallParticipantVideoSourceGroup
 */
final class GroupCallParticipantVideoSourceGroup extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdcb118b7;
    
    public string $predicate = 'groupCallParticipantVideoSourceGroup';
    
    /**
     * @param string $semantics
     * @param list<int> $sources
     */
    public function __construct(
        public readonly string $semantics,
        public readonly array $sources
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->semantics);
        $buffer .= Serializer::vectorOfInts($this->sources);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $semantics = Deserializer::bytes($__payload, $__offset);
        $sources = Deserializer::vectorOfInts($__payload, $__offset);

        return new self(
            $semantics,
            $sources
        );
    }
}