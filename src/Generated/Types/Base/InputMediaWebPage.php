<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaWebPage
 */
final class InputMediaWebPage extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 3256584265;
    
    public string $_ = 'inputMediaWebPage';
    
    /**
     * @param string $url
     * @param bool|null $forceLargeMedia
     * @param bool|null $forceSmallMedia
     * @param bool|null $optional
     */
    public function __construct(
        public readonly string $url,
        public readonly ?bool $forceLargeMedia = null,
        public readonly ?bool $forceSmallMedia = null,
        public readonly ?bool $optional = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forceLargeMedia) $flags |= (1 << 0);
        if ($this->forceSmallMedia) $flags |= (1 << 1);
        if ($this->optional) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->url);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $forceLargeMedia = ($flags & (1 << 0)) ? true : null;
        $forceSmallMedia = ($flags & (1 << 1)) ? true : null;
        $optional = ($flags & (1 << 2)) ? true : null;
        $url = $deserializer->bytes($stream);
            return new self(
            $url,
            $forceLargeMedia,
            $forceSmallMedia,
            $optional
        );
    }
}