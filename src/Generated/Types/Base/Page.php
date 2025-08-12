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
    
    public string $predicate = 'page';
    
    /**
     * @param string $url
     * @param list<AbstractPageBlock> $blocks
     * @param list<AbstractPhoto> $photos
     * @param list<AbstractDocument> $documents
     * @param true|null $part
     * @param true|null $rtl
     * @param true|null $v2
     * @param int|null $views
     */
    public function __construct(
        public readonly string $url,
        public readonly array $blocks,
        public readonly array $photos,
        public readonly array $documents,
        public readonly ?true $part = null,
        public readonly ?true $rtl = null,
        public readonly ?true $v2 = null,
        public readonly ?int $views = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->part) $flags |= (1 << 0);
        if ($this->rtl) $flags |= (1 << 1);
        if ($this->v2) $flags |= (1 << 2);
        if ($this->views !== null) $flags |= (1 << 3);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::vectorOfObjects($this->blocks);
        $buffer .= Serializer::vectorOfObjects($this->photos);
        $buffer .= Serializer::vectorOfObjects($this->documents);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->views);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $part = ($flags & (1 << 0)) ? true : null;
        $rtl = ($flags & (1 << 1)) ? true : null;
        $v2 = ($flags & (1 << 2)) ? true : null;
        $url = Deserializer::bytes($stream);
        $blocks = Deserializer::vectorOfObjects($stream, [AbstractPageBlock::class, 'deserialize']);
        $photos = Deserializer::vectorOfObjects($stream, [AbstractPhoto::class, 'deserialize']);
        $documents = Deserializer::vectorOfObjects($stream, [AbstractDocument::class, 'deserialize']);
        $views = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;

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