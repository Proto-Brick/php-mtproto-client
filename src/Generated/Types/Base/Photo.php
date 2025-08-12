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
    
    public string $predicate = 'photo';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $fileReference
     * @param int $date
     * @param list<AbstractPhotoSize> $sizes
     * @param int $dcId
     * @param true|null $hasStickers
     * @param list<AbstractVideoSize>|null $videoSizes
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $fileReference,
        public readonly int $date,
        public readonly array $sizes,
        public readonly int $dcId,
        public readonly ?true $hasStickers = null,
        public readonly ?array $videoSizes = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasStickers) $flags |= (1 << 0);
        if ($this->videoSizes !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->fileReference);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::vectorOfObjects($this->sizes);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->videoSizes);
        }
        $buffer .= Serializer::int32($this->dcId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $hasStickers = ($flags & (1 << 0)) ? true : null;
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        $fileReference = Deserializer::bytes($stream);
        $date = Deserializer::int32($stream);
        $sizes = Deserializer::vectorOfObjects($stream, [AbstractPhotoSize::class, 'deserialize']);
        $videoSizes = ($flags & (1 << 1)) ? Deserializer::vectorOfObjects($stream, [AbstractVideoSize::class, 'deserialize']) : null;
        $dcId = Deserializer::int32($stream);

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