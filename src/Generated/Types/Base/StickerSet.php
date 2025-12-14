<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/stickerSet
 */
final class StickerSet extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2dd14edc;
    
    public string $predicate = 'stickerSet';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $title
     * @param string $shortName
     * @param int $count
     * @param int $hash
     * @param true|null $archived
     * @param true|null $official
     * @param true|null $masks
     * @param true|null $emojis
     * @param true|null $textColor
     * @param true|null $channelEmojiStatus
     * @param true|null $creator
     * @param int|null $installedDate
     * @param list<AbstractPhotoSize>|null $thumbs
     * @param int|null $thumbDcId
     * @param int|null $thumbVersion
     * @param int|null $thumbDocumentId
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $title,
        public readonly string $shortName,
        public readonly int $count,
        public readonly int $hash,
        public readonly ?true $archived = null,
        public readonly ?true $official = null,
        public readonly ?true $masks = null,
        public readonly ?true $emojis = null,
        public readonly ?true $textColor = null,
        public readonly ?true $channelEmojiStatus = null,
        public readonly ?true $creator = null,
        public readonly ?int $installedDate = null,
        public readonly ?array $thumbs = null,
        public readonly ?int $thumbDcId = null,
        public readonly ?int $thumbVersion = null,
        public readonly ?int $thumbDocumentId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->archived) {
            $flags |= (1 << 1);
        }
        if ($this->official) {
            $flags |= (1 << 2);
        }
        if ($this->masks) {
            $flags |= (1 << 3);
        }
        if ($this->emojis) {
            $flags |= (1 << 7);
        }
        if ($this->textColor) {
            $flags |= (1 << 9);
        }
        if ($this->channelEmojiStatus) {
            $flags |= (1 << 10);
        }
        if ($this->creator) {
            $flags |= (1 << 11);
        }
        if ($this->installedDate !== null) {
            $flags |= (1 << 0);
        }
        if ($this->thumbs !== null) {
            $flags |= (1 << 4);
        }
        if ($this->thumbDcId !== null) {
            $flags |= (1 << 4);
        }
        if ($this->thumbVersion !== null) {
            $flags |= (1 << 4);
        }
        if ($this->thumbDocumentId !== null) {
            $flags |= (1 << 8);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->installedDate);
        }
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->shortName);
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::vectorOfObjects($this->thumbs);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->thumbDcId);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->thumbVersion);
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::int64($this->thumbDocumentId);
        }
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::int32($this->hash);
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
        $archived = (($flags & (1 << 1)) !== 0) ? true : null;
        $official = (($flags & (1 << 2)) !== 0) ? true : null;
        $masks = (($flags & (1 << 3)) !== 0) ? true : null;
        $emojis = (($flags & (1 << 7)) !== 0) ? true : null;
        $textColor = (($flags & (1 << 9)) !== 0) ? true : null;
        $channelEmojiStatus = (($flags & (1 << 10)) !== 0) ? true : null;
        $creator = (($flags & (1 << 11)) !== 0) ? true : null;
        $installedDate = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $id = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $accessHash = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $title = Deserializer::bytes($stream);
        $shortName = Deserializer::bytes($stream);
        $thumbs = (($flags & (1 << 4)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractPhotoSize::class, 'deserialize']) : null;
        $thumbDcId = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($stream) : null;
        $thumbVersion = (($flags & (1 << 4)) !== 0) ? Deserializer::int32($stream) : null;
        $thumbDocumentId = (($flags & (1 << 8)) !== 0) ? Deserializer::int64($stream) : null;
        $count = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $hash = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $id,
            $accessHash,
            $title,
            $shortName,
            $count,
            $hash,
            $archived,
            $official,
            $masks,
            $emojis,
            $textColor,
            $channelEmojiStatus,
            $creator,
            $installedDate,
            $thumbs,
            $thumbDcId,
            $thumbVersion,
            $thumbDocumentId
        );
    }
}