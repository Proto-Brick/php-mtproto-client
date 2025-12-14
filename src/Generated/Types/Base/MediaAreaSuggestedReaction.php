<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
        if ($this->dark) {
            $flags |= (1 << 0);
        }
        if ($this->flipped) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->coordinates->serialize();
        $buffer .= $this->reaction->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $dark = (($flags & (1 << 0)) !== 0) ? true : null;
        $flipped = (($flags & (1 << 1)) !== 0) ? true : null;
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