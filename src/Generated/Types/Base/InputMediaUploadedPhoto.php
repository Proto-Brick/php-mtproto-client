<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaUploadedPhoto
 */
final class InputMediaUploadedPhoto extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 505969924;
    
    public string $_ = 'inputMediaUploadedPhoto';
    
    /**
     * @param AbstractInputFile $file
     * @param bool|null $spoiler
     * @param list<AbstractInputDocument>|null $stickers
     * @param int|null $ttlSeconds
     */
    public function __construct(
        public readonly AbstractInputFile $file,
        public readonly ?bool $spoiler = null,
        public readonly ?array $stickers = null,
        public readonly ?int $ttlSeconds = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->spoiler) $flags |= (1 << 2);
        if ($this->stickers !== null) $flags |= (1 << 0);
        if ($this->ttlSeconds !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->file->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfObjects($this->stickers);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->ttlSeconds);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $spoiler = ($flags & (1 << 2)) ? true : null;
        $file = AbstractInputFile::deserialize($deserializer, $stream);
        $stickers = ($flags & (1 << 0)) ? $deserializer->vectorOfObjects($stream, [AbstractInputDocument::class, 'deserialize']) : null;
        $ttlSeconds = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
            return new self(
            $file,
            $spoiler,
            $stickers,
            $ttlSeconds
        );
    }
}