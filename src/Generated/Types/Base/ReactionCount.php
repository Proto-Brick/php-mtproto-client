<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/reactionCount
 */
final class ReactionCount extends AbstractReactionCount
{
    public const CONSTRUCTOR_ID = 2748435328;
    
    public string $_ = 'reactionCount';
    
    /**
     * @param AbstractReaction $reaction
     * @param int $count
     * @param int|null $chosenOrder
     */
    public function __construct(
        public readonly AbstractReaction $reaction,
        public readonly int $count,
        public readonly ?int $chosenOrder = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->chosenOrder !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->chosenOrder);
        }
        $buffer .= $this->reaction->serialize($serializer);
        $buffer .= $serializer->int32($this->count);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $chosenOrder = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $reaction = AbstractReaction::deserialize($deserializer, $stream);
        $count = $deserializer->int32($stream);
            return new self(
            $reaction,
            $count,
            $chosenOrder
        );
    }
}