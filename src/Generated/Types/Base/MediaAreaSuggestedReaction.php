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
    public const CONSTRUCTOR_ID = 0x14455871;
    
    public string $predicate = 'mediaAreaSuggestedReaction';
    
    /**
     * @param MediaAreaCoordinates $coordinates
     * @param AbstractReaction $reaction
     * @param true|null $dark
     * @param true|null $flipped
     */
    public function __construct(
        public readonly MediaAreaCoordinates $coordinates,
        public readonly AbstractReaction $reaction,
        public readonly ?true $dark = null,
        public readonly ?true $flipped = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->dark) $flags |= (1 << 0);
        if ($this->flipped) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->coordinates->serialize();
        $buffer .= $this->reaction->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $dark = ($flags & (1 << 0)) ? true : null;
        $flipped = ($flags & (1 << 1)) ? true : null;
        $coordinates = MediaAreaCoordinates::deserialize($stream);
        $reaction = AbstractReaction::deserialize($stream);

        return new self(
            $coordinates,
            $reaction,
            $dark,
            $flipped
        );
    }
}