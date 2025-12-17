<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/document
 */
final class Document extends AbstractDocument
{
    public const CONSTRUCTOR_ID = 0x8fd4c4d8;
    
    public string $predicate = 'document';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $fileReference
     * @param int $date
     * @param string $mimeType
     * @param int $size
     * @param int $dcId
     * @param list<AbstractDocumentAttribute> $attributes
     * @param list<AbstractPhotoSize>|null $thumbs
     * @param list<AbstractVideoSize>|null $videoThumbs
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $fileReference,
        public readonly int $date,
        public readonly string $mimeType,
        public readonly int $size,
        public readonly int $dcId,
        public readonly array $attributes,
        public readonly ?array $thumbs = null,
        public readonly ?array $videoThumbs = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->thumbs !== null) {
            $flags |= (1 << 0);
        }
        if ($this->videoThumbs !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->fileReference);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::bytes($this->mimeType);
        $buffer .= Serializer::int64($this->size);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->thumbs);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->videoThumbs);
        }
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::vectorOfObjects($this->attributes);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $id = Deserializer::int64($__payload, $__offset);
        $accessHash = Deserializer::int64($__payload, $__offset);
        $fileReference = Deserializer::bytes($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $mimeType = Deserializer::bytes($__payload, $__offset);
        $size = Deserializer::int64($__payload, $__offset);
        $thumbs = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractPhotoSize::class, 'deserialize']) : null;
        $videoThumbs = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfObjects($__payload, $__offset, [AbstractVideoSize::class, 'deserialize']) : null;
        $dcId = Deserializer::int32($__payload, $__offset);
        $attributes = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDocumentAttribute::class, 'deserialize']);

        return new self(
            $id,
            $accessHash,
            $fileReference,
            $date,
            $mimeType,
            $size,
            $dcId,
            $attributes,
            $thumbs,
            $videoThumbs
        );
    }
}