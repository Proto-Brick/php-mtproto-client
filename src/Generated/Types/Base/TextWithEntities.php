<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/textWithEntities
 */
final class TextWithEntities extends TlObject
{
    public const CONSTRUCTOR_ID = 0x751f3146;
    
    public string $predicate = 'textWithEntities';
    
    /**
     * @param string $text
     * @param list<AbstractMessageEntity> $entities
     */
    public function __construct(
        public readonly string $text,
        public readonly array $entities
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::vectorOfObjects($this->entities);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $text = Deserializer::bytes($__payload, $__offset);
        $entities = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractMessageEntity::class, 'deserialize']);

        return new self(
            $text,
            $entities
        );
    }
}