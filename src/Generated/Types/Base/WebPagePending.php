<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/webPagePending
 */
final class WebPagePending extends AbstractWebPage
{
    public const CONSTRUCTOR_ID = 0xb0d13e47;
    
    public string $_ = 'webPagePending';
    
    /**
     * @param int $id
     * @param int $date
     * @param string|null $url
     */
    public function __construct(
        public readonly int $id,
        public readonly int $date,
        public readonly ?string $url = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->url !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->url);
        }
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $id = $deserializer->int64($stream);
        $url = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $date = $deserializer->int32($stream);
        return new self(
            $id,
            $date,
            $url
        );
    }
}