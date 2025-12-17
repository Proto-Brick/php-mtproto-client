<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.stickers
 */
final class Stickers extends AbstractStickers
{
    public const CONSTRUCTOR_ID = 0x30a6ec7e;
    
    public string $predicate = 'messages.stickers';
    
    /**
     * @param int $hash
     * @param list<AbstractDocument> $stickers
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $stickers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->stickers);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $hash = Deserializer::int64($__payload, $__offset);
        $stickers = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDocument::class, 'deserialize']);

        return new self(
            $hash,
            $stickers
        );
    }
}