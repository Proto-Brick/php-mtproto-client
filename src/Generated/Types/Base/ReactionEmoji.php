<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/reactionEmoji
 */
final class ReactionEmoji extends AbstractReaction
{
    public const CONSTRUCTOR_ID = 0x1b2286b8;
    
    public string $predicate = 'reactionEmoji';
    
    /**
     * @param string $emoticon
     */
    public function __construct(
        public readonly string $emoticon
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->emoticon);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $emoticon = Deserializer::bytes($stream);

        return new self(
            $emoticon
        );
    }
}