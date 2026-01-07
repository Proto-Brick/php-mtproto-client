<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inputStickerSetItem
 */
final class InputStickerSetItem extends TlObject
{
    public const CONSTRUCTOR_ID = 0x32da9e9c;
    
    public string $predicate = 'inputStickerSetItem';
    
    /**
     * @param AbstractInputDocument $document
     * @param string $emoji
     * @param MaskCoords|null $maskCoords
     * @param string|null $keywords
     */
    public function __construct(
        public readonly AbstractInputDocument $document,
        public readonly string $emoji,
        public readonly ?MaskCoords $maskCoords = null,
        public readonly ?string $keywords = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->maskCoords !== null) {
            $flags |= (1 << 0);
        }
        if ($this->keywords !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->document->serialize();
        $buffer .= Serializer::bytes($this->emoji);
        if ($flags & (1 << 0)) {
            $buffer .= $this->maskCoords->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->keywords);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $document = AbstractInputDocument::deserialize($__payload, $__offset);
        $emoji = Deserializer::bytes($__payload, $__offset);
        $maskCoords = (($flags & (1 << 0)) !== 0) ? MaskCoords::deserialize($__payload, $__offset) : null;
        $keywords = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $document,
            $emoji,
            $maskCoords,
            $keywords
        );
    }
}