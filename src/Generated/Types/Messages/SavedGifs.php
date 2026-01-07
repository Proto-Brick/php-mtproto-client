<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.savedGifs
 */
final class SavedGifs extends AbstractSavedGifs
{
    public const CONSTRUCTOR_ID = 0x84a02a0d;
    
    public string $predicate = 'messages.savedGifs';
    
    /**
     * @param int $hash
     * @param list<AbstractDocument> $gifs
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $gifs
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->gifs);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $hash = Deserializer::int64($__payload, $__offset);
        $gifs = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDocument::class, 'deserialize']);

        return new self(
            $hash,
            $gifs
        );
    }
}