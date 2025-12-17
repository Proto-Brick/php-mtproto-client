<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\StoryAlbum;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/stories.albums
 */
final class Albums extends AbstractAlbums
{
    public const CONSTRUCTOR_ID = 0xc3987a3a;
    
    public string $predicate = 'stories.albums';
    
    /**
     * @param int $hash
     * @param list<StoryAlbum> $albums
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $albums
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->albums);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $hash = Deserializer::int64($__payload, $__offset);
        $albums = Deserializer::vectorOfObjects($__payload, $__offset, [StoryAlbum::class, 'deserialize']);

        return new self(
            $hash,
            $albums
        );
    }
}