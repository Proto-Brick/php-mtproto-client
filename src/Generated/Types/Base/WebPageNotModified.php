<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webPageNotModified
 */
final class WebPageNotModified extends AbstractWebPage
{
    public const CONSTRUCTOR_ID = 0x7311ca11;
    
    public string $predicate = 'webPageNotModified';
    
    /**
     * @param int|null $cachedPageViews
     */
    public function __construct(
        public readonly ?int $cachedPageViews = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->cachedPageViews !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->cachedPageViews);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $cachedPageViews = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;

        return new self(
            $cachedPageViews
        );
    }
}