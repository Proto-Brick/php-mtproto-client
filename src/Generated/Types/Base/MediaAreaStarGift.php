<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $coordinates = MediaAreaCoordinates::deserialize($stream);
        $slug = Deserializer::bytes($stream);

        return new self(
            $coordinates,
            $slug
        );
    }
}