<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaUploadedDocument
 */
final class InputMediaUploadedDocument extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0x5b38c6c1;
    
    public string $predicate = 'inputMediaUploadedDocument';
    
    /**
     * @param AbstractInputFile $file
     * @param string $mimeType
     * @param list<AbstractDocumentAttribute> $attributes
     * @param true|null $nosoundVideo
     * @param true|null $forceFile
     * @param true|null $spoiler
     * @param AbstractInputFile|null $thumb
     * @param list<AbstractInputDocument>|null $stickers
     * @param int|null $ttlSeconds
     */
    public function __construct(
        public readonly AbstractInputFile $file,
        public readonly string $mimeType,
        public readonly array $attributes,
        public readonly ?true $nosoundVideo = null,
        public readonly ?true $forceFile = null,
        public readonly ?true $spoiler = null,
        public readonly ?AbstractInputFile $thumb = null,
        public readonly ?array $stickers = null,
        public readonly ?int $ttlSeconds = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nosoundVideo) $flags |= (1 << 3);
        if ($this->forceFile) $flags |= (1 << 4);
        if ($this->spoiler) $flags |= (1 << 5);
        if ($this->thumb !== null) $flags |= (1 << 2);
        if ($this->stickers !== null) $flags |= (1 << 0);
        if ($this->ttlSeconds !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->file->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= $this->thumb->serialize();
        }
        $buffer .= Serializer::bytes($this->mimeType);
        $buffer .= Serializer::vectorOfObjects($this->attributes);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->stickers);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $nosoundVideo = ($flags & (1 << 3)) ? true : null;
        $forceFile = ($flags & (1 << 4)) ? true : null;
        $spoiler = ($flags & (1 << 5)) ? true : null;
        $file = AbstractInputFile::deserialize($stream);
        $thumb = ($flags & (1 << 2)) ? AbstractInputFile::deserialize($stream) : null;
        $mimeType = Deserializer::bytes($stream);
        $attributes = Deserializer::vectorOfObjects($stream, [AbstractDocumentAttribute::class, 'deserialize']);
        $stickers = ($flags & (1 << 0)) ? Deserializer::vectorOfObjects($stream, [AbstractInputDocument::class, 'deserialize']) : null;
        $ttlSeconds = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;

        return new self(
            $file,
            $mimeType,
            $attributes,
            $nosoundVideo,
            $forceFile,
            $spoiler,
            $thumb,
            $stickers,
            $ttlSeconds
        );
    }
}