<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $url = Deserializer::bytes($__payload, $__offset);
        $set = AbstractStickerSetCovered::deserialize($__payload, $__offset);

        return new self(
            $url,
            $set
        );
    }
}