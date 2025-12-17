<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStickerSetCovered;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/messages.archivedStickers
 */
final class ArchivedStickers extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4fcba9c8;
    
    public string $predicate = 'messages.archivedStickers';
    
    /**
     * @param int $count
     * @param list<AbstractStickerSetCovered> $sets
     */
    public function __construct(
        public readonly int $count,
        public readonly array $sets
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->sets);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $count = Deserializer::int32($__payload, $__offset);
        $sets = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractStickerSetCovered::class, 'deserialize']);

        return new self(
            $count,
            $sets
        );
    }
}