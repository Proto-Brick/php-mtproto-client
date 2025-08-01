<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/mediaAreaSuggestedReaction
 */
final class MediaAreaSuggestedReaction extends AbstractMediaArea
{
    public const CONSTRUCTOR_ID = 340088945;
    
    public string $_ = 'mediaAreaSuggestedReaction';
    
    /**
     * @param AbstractMediaAreaCoordinates $coordinates
     * @param AbstractReaction $reaction
     * @param bool|null $dark
     * @param bool|null $flipped
     */
    public function __construct(
        public readonly AbstractMediaAreaCoordinates $coordinates,
        public readonly AbstractReaction $reaction,
        public readonly ?bool $dark = null,
        public readonly ?bool $flipped = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->dark) $flags |= (1 << 0);
        if ($this->flipped) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->coordinates->serialize($serializer);
        $buffer .= $this->reaction->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $dark = ($flags & (1 << 0)) ? true : null;
        $flipped = ($flags & (1 << 1)) ? true : null;
        $coordinates = AbstractMediaAreaCoordinates::deserialize($deserializer, $stream);
        $reaction = AbstractReaction::deserialize($deserializer, $stream);
            return new self(
            $coordinates,
            $reaction,
            $dark,
            $flipped
        );
    }
}