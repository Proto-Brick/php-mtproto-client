<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/webPageAttributeStarGiftAuction
 */
final class WebPageAttributeStarGiftAuction extends AbstractWebPageAttribute
{
    public const CONSTRUCTOR_ID = 0x1c641c2;
    
    public string $predicate = 'webPageAttributeStarGiftAuction';
    
    /**
     * @param AbstractStarGift $gift
     * @param int $endDate
     */
    public function __construct(
        public readonly AbstractStarGift $gift,
        public readonly int $endDate
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->gift->serialize();
        $buffer .= Serializer::int32($this->endDate);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $gift = AbstractStarGift::deserialize($__payload, $__offset);
        $endDate = Deserializer::int32($__payload, $__offset);

        return new self(
            $gift,
            $endDate
        );
    }
}