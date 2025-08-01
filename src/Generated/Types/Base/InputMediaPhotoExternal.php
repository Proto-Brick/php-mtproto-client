<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaPhotoExternal
 */
final class InputMediaPhotoExternal extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 3854302746;
    
    public string $_ = 'inputMediaPhotoExternal';
    
    /**
     * @param string $url
     * @param bool|null $spoiler
     * @param int|null $ttlSeconds
     */
    public function __construct(
        public readonly string $url,
        public readonly ?bool $spoiler = null,
        public readonly ?int $ttlSeconds = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->spoiler) $flags |= (1 << 1);
        if ($this->ttlSeconds !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->url);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->ttlSeconds);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $spoiler = ($flags & (1 << 1)) ? true : null;
        $url = $deserializer->bytes($stream);
        $ttlSeconds = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
            return new self(
            $url,
            $spoiler,
            $ttlSeconds
        );
    }
}