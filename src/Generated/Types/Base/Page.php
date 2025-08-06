<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/page
 */
final class Page extends TlObject
{
    public const CONSTRUCTOR_ID = 0x98657f0d;
    
    public string $_ = 'page';
    
    /**
     * @param string $url
     * @param list<AbstractPageBlock> $blocks
     * @param list<AbstractPhoto> $photos
     * @param list<AbstractDocument> $documents
     * @param bool|null $part
     * @param bool|null $rtl
     * @param bool|null $v2
     * @param int|null $views
     */
    public function __construct(
        public readonly string $url,
        public readonly array $blocks,
        public readonly array $photos,
        public readonly array $documents,
        public readonly ?bool $part = null,
        public readonly ?bool $rtl = null,
        public readonly ?bool $v2 = null,
        public readonly ?int $views = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->part) $flags |= (1 << 0);
        if ($this->rtl) $flags |= (1 << 1);
        if ($this->v2) $flags |= (1 << 2);
        if ($this->views !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->vectorOfObjects($this->blocks);
        $buffer .= $serializer->vectorOfObjects($this->photos);
        $buffer .= $serializer->vectorOfObjects($this->documents);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->int32($this->views);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $part = ($flags & (1 << 0)) ? true : null;
        $rtl = ($flags & (1 << 1)) ? true : null;
        $v2 = ($flags & (1 << 2)) ? true : null;
        $url = $deserializer->bytes($stream);
        $blocks = $deserializer->vectorOfObjects($stream, [AbstractPageBlock::class, 'deserialize']);
        $photos = $deserializer->vectorOfObjects($stream, [AbstractPhoto::class, 'deserialize']);
        $documents = $deserializer->vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        $views = ($flags & (1 << 3)) ? $deserializer->int32($stream) : null;
        return new self(
            $url,
            $blocks,
            $photos,
            $documents,
            $part,
            $rtl,
            $v2,
            $views
        );
    }
}