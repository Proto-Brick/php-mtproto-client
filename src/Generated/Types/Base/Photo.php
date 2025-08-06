<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/photo
 */
final class Photo extends AbstractPhoto
{
    public const CONSTRUCTOR_ID = 0xfb197a65;
    
    public string $_ = 'photo';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $fileReference
     * @param int $date
     * @param list<AbstractPhotoSize> $sizes
     * @param int $dcId
     * @param bool|null $hasStickers
     * @param list<AbstractVideoSize>|null $videoSizes
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $fileReference,
        public readonly int $date,
        public readonly array $sizes,
        public readonly int $dcId,
        public readonly ?bool $hasStickers = null,
        public readonly ?array $videoSizes = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasStickers) $flags |= (1 << 0);
        if ($this->videoSizes !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int64($this->accessHash);
        $buffer .= $serializer->bytes($this->fileReference);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->vectorOfObjects($this->sizes);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->videoSizes);
        }
        $buffer .= $serializer->int32($this->dcId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $hasStickers = ($flags & (1 << 0)) ? true : null;
        $id = $deserializer->int64($stream);
        $accessHash = $deserializer->int64($stream);
        $fileReference = $deserializer->bytes($stream);
        $date = $deserializer->int32($stream);
        $sizes = $deserializer->vectorOfObjects($stream, [AbstractPhotoSize::class, 'deserialize']);
        $videoSizes = ($flags & (1 << 1)) ? $deserializer->vectorOfObjects($stream, [AbstractVideoSize::class, 'deserialize']) : null;
        $dcId = $deserializer->int32($stream);
        return new self(
            $id,
            $accessHash,
            $fileReference,
            $date,
            $sizes,
            $dcId,
            $hasStickers,
            $videoSizes
        );
    }
}