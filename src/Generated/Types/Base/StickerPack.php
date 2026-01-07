<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/stickerPack
 */
final class StickerPack extends TlObject
{
    public const CONSTRUCTOR_ID = 0x12b299d4;
    
    public string $predicate = 'stickerPack';
    
    /**
     * @param string $emoticon
     * @param list<int> $documents
     */
    public function __construct(
        public readonly string $emoticon,
        public readonly array $documents
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->emoticon);
        $buffer .= Serializer::vectorOfLongs($this->documents);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $emoticon = Deserializer::bytes($__payload, $__offset);
        $documents = Deserializer::vectorOfLongs($__payload, $__offset);

        return new self(
            $emoticon,
            $documents
        );
    }
}