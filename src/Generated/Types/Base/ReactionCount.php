<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/reactionCount
 */
final class ReactionCount extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa3d1cb80;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->chosenOrder !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->chosenOrder);
        }
        $buffer .= $this->reaction->serialize();
        $buffer .= Serializer::int32($this->count);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $chosenOrder = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $reaction = AbstractReaction::deserialize($stream);
        $count = Deserializer::int32($stream);
        return new self(
            $reaction,
            $count,
            $chosenOrder
        );
    }
}