<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputWebFileAudioAlbumThumbLocation
 */
final class InputWebFileAudioAlbumThumbLocation extends AbstractInputWebFileLocation
{
    public const CONSTRUCTOR_ID = 0xf46fe924;
    
    public string $_ = 'inputWebFileAudioAlbumThumbLocation';
    
    /**
     * @param bool|null $small
     * @param AbstractInputDocument|null $document
     * @param string|null $title
     * @param string|null $performer
     */
    public function __construct(
        public readonly ?bool $small = null,
        public readonly ?AbstractInputDocument $document = null,
        public readonly ?string $title = null,
        public readonly ?string $performer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->small) $flags |= (1 << 2);
        if ($this->document !== null) $flags |= (1 << 0);
        if ($this->title !== null) $flags |= (1 << 1);
        if ($this->performer !== null) $flags |= (1 << 1);
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $small = ($flags & (1 << 2)) ? true : null;
        $document = ($flags & (1 << 0)) ? AbstractInputDocument::deserialize($stream) : null;
        $title = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $performer = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        return new self(
            $small,
            $document,
            $title,
            $performer
        );
    }
}