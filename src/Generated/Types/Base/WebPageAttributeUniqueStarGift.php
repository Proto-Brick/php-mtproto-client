<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/webPageAttributeUniqueStarGift
 */
final class WebPageAttributeUniqueStarGift extends AbstractWebPageAttribute
{
    public const CONSTRUCTOR_ID = 0xcf6f6db8;
    
    public string $predicate = 'webPageAttributeUniqueStarGift';
    
    /**
     * @param AbstractStarGift $gift
     */
    public function __construct(
        public readonly AbstractStarGift $gift
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->gift->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $gift = AbstractStarGift::deserialize($__payload, $__offset);

        return new self(
            $gift
        );
    }
}