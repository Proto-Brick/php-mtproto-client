<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputMediaUploadedDocument
 */
final class InputMediaUploadedDocument extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0x37c9330;
    
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
     * @param AbstractInputPhoto|null $videoCover
     * @param int|null $videoTimestamp
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
        public readonly ?AbstractInputPhoto $videoCover = null,
        public readonly ?int $videoTimestamp = null,
        public readonly ?int $ttlSeconds = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nosoundVideo) {
            $flags |= (1 << 3);
        }
        if ($this->forceFile) {
            $flags |= (1 << 4);
        }
        if ($this->spoiler) {
            $flags |= (1 << 5);
        }
        if ($this->thumb !== null) {
            $flags |= (1 << 2);
        }
        if ($this->stickers !== null) {
            $flags |= (1 << 0);
        }
        if ($this->videoCover !== null) {
            $flags |= (1 << 6);
        }
        if ($this->videoTimestamp !== null) {
            $flags |= (1 << 7);
        }
        if ($this->ttlSeconds !== null) {
            $flags |= (1 << 1);
        }
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
        if ($flags & (1 << 6)) {
            $buffer .= $this->videoCover->serialize();
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::int32($this->videoTimestamp);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->ttlSeconds);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $nosoundVideo = (($flags & (1 << 3)) !== 0) ? true : null;
        $forceFile = (($flags & (1 << 4)) !== 0) ? true : null;
        $spoiler = (($flags & (1 << 5)) !== 0) ? true : null;
        $file = AbstractInputFile::deserialize($__payload, $__offset);
        $thumb = (($flags & (1 << 2)) !== 0) ? AbstractInputFile::deserialize($__payload, $__offset) : null;
        $mimeType = Deserializer::bytes($__payload, $__offset);
        $attributes = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDocumentAttribute::class, 'deserialize']);
        $stickers = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractInputDocument::class, 'deserialize']) : null;
        $videoCover = (($flags & (1 << 6)) !== 0) ? AbstractInputPhoto::deserialize($__payload, $__offset) : null;
        $videoTimestamp = (($flags & (1 << 7)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $ttlSeconds = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;

        return new self(
            $file,
            $mimeType,
            $attributes,
            $nosoundVideo,
            $forceFile,
            $spoiler,
            $thumb,
            $stickers,
            $videoCover,
            $videoTimestamp,
            $ttlSeconds
        );
    }
}