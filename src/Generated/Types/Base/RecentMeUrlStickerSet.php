<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/recentMeUrlStickerSet
 */
final class RecentMeUrlStickerSet extends AbstractRecentMeUrl
{
    public const CONSTRUCTOR_ID = 0xbc0a57dc;
    
    public string $_ = 'recentMeUrlStickerSet';
    
    /**
     * @param string $url
     * @param AbstractStickerSetCovered $set
     */
    public function __construct(
        public readonly string $url,
        public readonly AbstractStickerSetCovered $set
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $this->set->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $url = $deserializer->bytes($stream);
        $set = AbstractStickerSetCovered::deserialize($deserializer, $stream);
        return new self(
            $url,
            $set
        );
    }
}