<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stickerSet
 */
final class StickerSet extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2dd14edc;
    
    public string $_ = 'stickerSet';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $title
     * @param string $shortName
     * @param int $count
     * @param int $hash
     * @param bool|null $archived
     * @param bool|null $official
     * @param bool|null $masks
     * @param bool|null $emojis
     * @param bool|null $textColor
     * @param bool|null $channelEmojiStatus
     * @param bool|null $creator
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
        public readonly ?bool $archived = null,
        public readonly ?bool $official = null,
        public readonly ?bool $masks = null,
        public readonly ?bool $emojis = null,
        public readonly ?bool $textColor = null,
        public readonly ?bool $channelEmojiStatus = null,
        public readonly ?bool $creator = null,
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
        if ($this->archived) $flags |= (1 << 1);
        if ($this->official) $flags |= (1 << 2);
        if ($this->masks) $flags |= (1 << 3);
        if ($this->emojis) $flags |= (1 << 7);
        if ($this->textColor) $flags |= (1 << 9);
        if ($this->channelEmojiStatus) $flags |= (1 << 10);
        if ($this->creator) $flags |= (1 << 11);
        if ($this->installedDate !== null) $flags |= (1 << 0);
        if ($this->thumbs !== null) $flags |= (1 << 4);
        if ($this->thumbDcId !== null) $flags |= (1 << 4);
        if ($this->thumbVersion !== null) $flags |= (1 << 4);
        if ($this->thumbDocumentId !== null) $flags |= (1 << 8);
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
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $archived = ($flags & (1 << 1)) ? true : null;
        $official = ($flags & (1 << 2)) ? true : null;
        $masks = ($flags & (1 << 3)) ? true : null;
        $emojis = ($flags & (1 << 7)) ? true : null;
        $textColor = ($flags & (1 << 9)) ? true : null;
        $channelEmojiStatus = ($flags & (1 << 10)) ? true : null;
        $creator = ($flags & (1 << 11)) ? true : null;
        $installedDate = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        $title = Deserializer::bytes($stream);
        $shortName = Deserializer::bytes($stream);
        $thumbs = ($flags & (1 << 4)) ? Deserializer::vectorOfObjects($stream, [AbstractPhotoSize::class, 'deserialize']) : null;
        $thumbDcId = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;
        $thumbVersion = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;
        $thumbDocumentId = ($flags & (1 << 8)) ? Deserializer::int64($stream) : null;
        $count = Deserializer::int32($stream);
        $hash = Deserializer::int32($stream);
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