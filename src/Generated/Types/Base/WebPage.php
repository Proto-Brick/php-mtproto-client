<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/webPage
 */
final class WebPage extends AbstractWebPage
{
    public const CONSTRUCTOR_ID = 0xe89c45b2;
    
    public string $predicate = 'webPage';
    
    /**
     * @param int $id
     * @param string $url
     * @param string $displayUrl
     * @param int $hash
     * @param true|null $hasLargeMedia
     * @param true|null $videoCoverPhoto
     * @param string|null $type
     * @param string|null $siteName
     * @param string|null $title
     * @param string|null $description
     * @param AbstractPhoto|null $photo
     * @param string|null $embedUrl
     * @param string|null $embedType
     * @param int|null $embedWidth
     * @param int|null $embedHeight
     * @param int|null $duration
     * @param string|null $author
     * @param AbstractDocument|null $document
     * @param Page|null $cachedPage
     * @param list<AbstractWebPageAttribute>|null $attributes
     */
    public function __construct(
        public readonly int $id,
        public readonly string $url,
        public readonly string $displayUrl,
        public readonly int $hash,
        public readonly ?true $hasLargeMedia = null,
        public readonly ?true $videoCoverPhoto = null,
        public readonly ?string $type = null,
        public readonly ?string $siteName = null,
        public readonly ?string $title = null,
        public readonly ?string $description = null,
        public readonly ?AbstractPhoto $photo = null,
        public readonly ?string $embedUrl = null,
        public readonly ?string $embedType = null,
        public readonly ?int $embedWidth = null,
        public readonly ?int $embedHeight = null,
        public readonly ?int $duration = null,
        public readonly ?string $author = null,
        public readonly ?AbstractDocument $document = null,
        public readonly ?Page $cachedPage = null,
        public readonly ?array $attributes = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasLargeMedia) {
            $flags |= (1 << 13);
        }
        if ($this->videoCoverPhoto) {
            $flags |= (1 << 14);
        }
        if ($this->type !== null) {
            $flags |= (1 << 0);
        }
        if ($this->siteName !== null) {
            $flags |= (1 << 1);
        }
        if ($this->title !== null) {
            $flags |= (1 << 2);
        }
        if ($this->description !== null) {
            $flags |= (1 << 3);
        }
        if ($this->photo !== null) {
            $flags |= (1 << 4);
        }
        if ($this->embedUrl !== null) {
            $flags |= (1 << 5);
        }
        if ($this->embedType !== null) {
            $flags |= (1 << 5);
        }
        if ($this->embedWidth !== null) {
            $flags |= (1 << 6);
        }
        if ($this->embedHeight !== null) {
            $flags |= (1 << 6);
        }
        if ($this->duration !== null) {
            $flags |= (1 << 7);
        }
        if ($this->author !== null) {
            $flags |= (1 << 8);
        }
        if ($this->document !== null) {
            $flags |= (1 << 9);
        }
        if ($this->cachedPage !== null) {
            $flags |= (1 << 10);
        }
        if ($this->attributes !== null) {
            $flags |= (1 << 12);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::bytes($this->displayUrl);
        $buffer .= Serializer::int32($this->hash);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->type);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->siteName);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->description);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->photo->serialize();
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::bytes($this->embedUrl);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::bytes($this->embedType);
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::int32($this->embedWidth);
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::int32($this->embedHeight);
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::int32($this->duration);
        }
        if ($flags & (1 << 8)) {
            $buffer .= Serializer::bytes($this->author);
        }
        if ($flags & (1 << 9)) {
            $buffer .= $this->document->serialize();
        }
        if ($flags & (1 << 10)) {
            $buffer .= $this->cachedPage->serialize();
        }
        if ($flags & (1 << 12)) {
            $buffer .= Serializer::vectorOfObjects($this->attributes);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $hasLargeMedia = (($flags & (1 << 13)) !== 0) ? true : null;
        $videoCoverPhoto = (($flags & (1 << 14)) !== 0) ? true : null;
        $id = Deserializer::int64($stream);
        $url = Deserializer::bytes($stream);
        $displayUrl = Deserializer::bytes($stream);
        $hash = Deserializer::int32($stream);
        $type = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;
        $siteName = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $title = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($stream) : null;
        $description = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($stream) : null;
        $photo = (($flags & (1 << 4)) !== 0) ? AbstractPhoto::deserialize($stream) : null;
        $embedUrl = (($flags & (1 << 5)) !== 0) ? Deserializer::bytes($stream) : null;
        $embedType = (($flags & (1 << 5)) !== 0) ? Deserializer::bytes($stream) : null;
        $embedWidth = (($flags & (1 << 6)) !== 0) ? Deserializer::int32($stream) : null;
        $embedHeight = (($flags & (1 << 6)) !== 0) ? Deserializer::int32($stream) : null;
        $duration = (($flags & (1 << 7)) !== 0) ? Deserializer::int32($stream) : null;
        $author = (($flags & (1 << 8)) !== 0) ? Deserializer::bytes($stream) : null;
        $document = (($flags & (1 << 9)) !== 0) ? AbstractDocument::deserialize($stream) : null;
        $cachedPage = (($flags & (1 << 10)) !== 0) ? Page::deserialize($stream) : null;
        $attributes = (($flags & (1 << 12)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractWebPageAttribute::class, 'deserialize']) : null;

        return new self(
            $id,
            $url,
            $displayUrl,
            $hash,
            $hasLargeMedia,
            $videoCoverPhoto,
            $type,
            $siteName,
            $title,
            $description,
            $photo,
            $embedUrl,
            $embedType,
            $embedWidth,
            $embedHeight,
            $duration,
            $author,
            $document,
            $cachedPage,
            $attributes
        );
    }
}