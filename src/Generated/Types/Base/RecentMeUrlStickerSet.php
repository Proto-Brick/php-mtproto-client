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
    
    public string $predicate = 'recentMeUrlStickerSet';
    
    /**
     * @param string $url
     * @param AbstractStickerSetCovered $set
     */
    public function __construct(
        public readonly string $url,
        public readonly AbstractStickerSetCovered $set
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= $this->set->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $url = Deserializer::bytes($stream);
        $set = AbstractStickerSetCovered::deserialize($stream);

        return new self(
            $url,
            $set
        );
    }
}