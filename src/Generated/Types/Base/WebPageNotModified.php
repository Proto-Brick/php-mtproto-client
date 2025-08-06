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
    
    public string $_ = 'webPageNotModified';
    
    /**
     * @param int|null $cachedPageViews
     */
    public function __construct(
        public readonly ?int $cachedPageViews = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->cachedPageViews !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->cachedPageViews);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $cachedPageViews = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        return new self(
            $cachedPageViews
        );
    }
}