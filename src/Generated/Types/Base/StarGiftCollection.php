<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starGiftCollection
 */
final class StarGiftCollection extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9d6b13b0;
    
    public string $predicate = 'starGiftCollection';
    
    /**
     * @param int $collectionId
     * @param string $title
     * @param int $giftsCount
     * @param int $hash
     * @param AbstractDocument|null $icon
     */
    public function __construct(
        public readonly int $collectionId,
        public readonly string $title,
        public readonly int $giftsCount,
        public readonly int $hash,
        public readonly ?AbstractDocument $icon = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->icon !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->collectionId);
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 0)) {
            $buffer .= $this->icon->serialize();
        }
        $buffer .= Serializer::int32($this->giftsCount);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $collectionId = Deserializer::int32($__payload, $__offset);
        $title = Deserializer::bytes($__payload, $__offset);
        $icon = (($flags & (1 << 0)) !== 0) ? AbstractDocument::deserialize($__payload, $__offset) : null;
        $giftsCount = Deserializer::int32($__payload, $__offset);
        $hash = Deserializer::int64($__payload, $__offset);

        return new self(
            $collectionId,
            $title,
            $giftsCount,
            $hash,
            $icon
        );
    }
}