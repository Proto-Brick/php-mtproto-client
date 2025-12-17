<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/mediaAreaStarGift
 */
final class MediaAreaStarGift extends AbstractMediaArea
{
    public const CONSTRUCTOR_ID = 0x5787686d;
    
    public string $predicate = 'mediaAreaStarGift';
    
    /**
     * @param MediaAreaCoordinates $coordinates
     * @param string $slug
     */
    public function __construct(
        public readonly MediaAreaCoordinates $coordinates,
        public readonly string $slug
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->coordinates->serialize();
        $buffer .= Serializer::bytes($this->slug);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $coordinates = MediaAreaCoordinates::deserialize($__payload, $__offset);
        $slug = Deserializer::bytes($__payload, $__offset);

        return new self(
            $coordinates,
            $slug
        );
    }
}