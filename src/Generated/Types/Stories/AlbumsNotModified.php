<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Stories;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/stories.albumsNotModified
 */
final class AlbumsNotModified extends AbstractAlbums
{
    public const CONSTRUCTOR_ID = 0x564edaeb;
    
    public string $predicate = 'stories.albumsNotModified';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID

        return new self();
    }
}