<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStickerSetCovered;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.foundStickerSets
 */
final class FoundStickerSets extends AbstractFoundStickerSets
{
    public const CONSTRUCTOR_ID = 0x8af09dd2;
    
    public string $predicate = 'messages.foundStickerSets';
    
    /**
     * @param int $hash
     * @param list<AbstractStickerSetCovered> $sets
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $sets
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->sets);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $sets = Deserializer::vectorOfObjects($stream, [AbstractStickerSetCovered::class, 'deserialize']);

        return new self(
            $hash,
            $sets
        );
    }
}