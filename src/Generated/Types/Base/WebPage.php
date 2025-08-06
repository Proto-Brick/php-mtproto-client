<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webPage
 */
final class WebPage extends AbstractWebPage
{
    public const CONSTRUCTOR_ID = 0xe89c45b2;
    
    public string $_ = 'webPage';
    
    /**
     * @param int $id
     * @param string $url
     * @param string $displayUrl
     * @param int $hash
     * @param bool|null $hasLargeMedia
     * @param bool|null $videoCoverPhoto
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
        public readonly ?bool $hasLargeMedia = null,
        public readonly ?bool $videoCoverPhoto = null,
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasLargeMedia) $flags |= (1 << 13);
        if ($this->videoCoverPhoto) $flags |= (1 << 14);
        if ($this->type !== null) $flags |= (1 << 0);
        if ($this->siteName !== null) $flags |= (1 << 1);
        if ($this->title !== null) $flags |= (1 << 2);
        if ($this->description !== null) $flags |= (1 << 3);
        if ($this->photo !== null) $flags |= (1 << 4);
        if ($this->embedUrl !== null) $flags |= (1 << 5);
        if ($this->embedType !== null) $flags |= (1 << 5);
        if ($this->embedWidth !== null) $flags |= (1 << 6);
        if ($this->embedHeight !== null) $flags |= (1 << 6);
        if ($this->duration !== null) $flags |= (1 << 7);
        if ($this->author !== null) $flags |= (1 << 8);
        if ($this->document !== null) $flags |= (1 << 9);
        if ($this->cachedPage !== null) $flags |= (1 << 10);
        if ($this->attributes !== null) $flags |= (1 << 12);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->bytes($this->displayUrl);
        $buffer .= $serializer->int32($this->hash);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->type);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->siteName);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->title);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->description);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->bytes($this->embedUrl);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $serializer->bytes($this->embedType);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->int32($this->embedWidth);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->int32($this->embedHeight);
        }
        if ($flags & (1 << 7)) {
            $buffer .= $serializer->int32($this->duration);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $serializer->bytes($this->author);
        }
        if ($flags & (1 << 9)) {
            $buffer .= $this->document->serialize($serializer);
        }
        if ($flags & (1 << 10)) {
            $buffer .= $this->cachedPage->serialize($serializer);
        }
        if ($flags & (1 << 12)) {
            $buffer .= $serializer->vectorOfObjects($this->attributes);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $hasLargeMedia = ($flags & (1 << 13)) ? true : null;
        $videoCoverPhoto = ($flags & (1 << 14)) ? true : null;
        $id = $deserializer->int64($stream);
        $url = $deserializer->bytes($stream);
        $displayUrl = $deserializer->bytes($stream);
        $hash = $deserializer->int32($stream);
        $type = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $siteName = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $title = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $description = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        $photo = ($flags & (1 << 4)) ? AbstractPhoto::deserialize($deserializer, $stream) : null;
        $embedUrl = ($flags & (1 << 5)) ? $deserializer->bytes($stream) : null;
        $embedType = ($flags & (1 << 5)) ? $deserializer->bytes($stream) : null;
        $embedWidth = ($flags & (1 << 6)) ? $deserializer->int32($stream) : null;
        $embedHeight = ($flags & (1 << 6)) ? $deserializer->int32($stream) : null;
        $duration = ($flags & (1 << 7)) ? $deserializer->int32($stream) : null;
        $author = ($flags & (1 << 8)) ? $deserializer->bytes($stream) : null;
        $document = ($flags & (1 << 9)) ? AbstractDocument::deserialize($deserializer, $stream) : null;
        $cachedPage = ($flags & (1 << 10)) ? Page::deserialize($deserializer, $stream) : null;
        $attributes = ($flags & (1 << 12)) ? $deserializer->vectorOfObjects($stream, [AbstractWebPageAttribute::class, 'deserialize']) : null;
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