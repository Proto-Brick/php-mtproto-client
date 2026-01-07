<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputWebFileAudioAlbumThumbLocation
 */
final class InputWebFileAudioAlbumThumbLocation extends AbstractInputWebFileLocation
{
    public const CONSTRUCTOR_ID = 0xf46fe924;
    
    public string $predicate = 'inputWebFileAudioAlbumThumbLocation';
    
    /**
     * @param true|null $small
     * @param AbstractInputDocument|null $document
     * @param string|null $title
     * @param string|null $performer
     */
    public function __construct(
        public readonly ?true $small = null,
        public readonly ?AbstractInputDocument $document = null,
        public readonly ?string $title = null,
        public readonly ?string $performer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->small) {
            $flags |= (1 << 2);
        }
        if ($this->document !== null) {
            $flags |= (1 << 0);
        }
        if ($this->title !== null) {
            $flags |= (1 << 1);
        }
        if ($this->performer !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->document->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->performer);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $small = (($flags & (1 << 2)) !== 0) ? true : null;
        $document = (($flags & (1 << 0)) !== 0) ? AbstractInputDocument::deserialize($__payload, $__offset) : null;
        $title = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $performer = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $small,
            $document,
            $title,
            $performer
        );
    }
}