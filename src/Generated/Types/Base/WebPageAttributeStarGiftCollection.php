<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/webPageAttributeStarGiftCollection
 */
final class WebPageAttributeStarGiftCollection extends AbstractWebPageAttribute
{
    public const CONSTRUCTOR_ID = 0x31cad303;
    
    public string $predicate = 'webPageAttributeStarGiftCollection';
    
    /**
     * @param list<AbstractDocument> $icons
     */
    public function __construct(
        public readonly array $icons
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->icons);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $icons = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractDocument::class, 'deserialize']);

        return new self(
            $icons
        );
    }
}