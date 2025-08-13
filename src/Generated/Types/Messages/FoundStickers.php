<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.foundStickers
 */
final class FoundStickers extends AbstractFoundStickers
{
    public const CONSTRUCTOR_ID = 0x82c9e290;
    
    public string $predicate = 'messages.foundStickers';
    
    /**
     * @param int $hash
     * @param list<AbstractDocument> $stickers
     * @param int|null $nextOffset
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $stickers,
        public readonly ?int $nextOffset = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nextOffset !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->nextOffset);
        }
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->stickers);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $nextOffset = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $hash = Deserializer::int64($stream);
        $stickers = Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);

        return new self(
            $hash,
            $stickers,
            $nextOffset
        );
    }
}