<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/storyAlbum
 */
final class StoryAlbum extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9325705a;
    
    public string $predicate = 'storyAlbum';
    
    /**
     * @param int $albumId
     * @param string $title
     * @param AbstractPhoto|null $iconPhoto
     * @param AbstractDocument|null $iconVideo
     */
    public function __construct(
        public readonly int $albumId,
        public readonly string $title,
        public readonly ?AbstractPhoto $iconPhoto = null,
        public readonly ?AbstractDocument $iconVideo = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->iconPhoto !== null) {
            $flags |= (1 << 0);
        }
        if ($this->iconVideo !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->albumId);
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 0)) {
            $buffer .= $this->iconPhoto->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->iconVideo->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $albumId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $title = Deserializer::bytes($stream);
        $iconPhoto = (($flags & (1 << 0)) !== 0) ? AbstractPhoto::deserialize($stream) : null;
        $iconVideo = (($flags & (1 << 1)) !== 0) ? AbstractDocument::deserialize($stream) : null;

        return new self(
            $albumId,
            $title,
            $iconPhoto,
            $iconVideo
        );
    }
}