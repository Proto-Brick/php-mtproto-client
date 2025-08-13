<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\StoryAlbum;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = Deserializer::int64($stream);
        $albums = Deserializer::vectorOfObjects($stream, [StoryAlbum::class, 'deserialize']);

        return new self(
            $hash,
            $albums
        );
    }
}