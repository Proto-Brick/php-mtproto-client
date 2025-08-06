<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/savedReactionTag
 */
final class SavedReactionTag extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcb6ff828;
    
    public string $_ = 'savedReactionTag';
    
    /**
     * @param AbstractReaction $reaction
     * @param int $count
     * @param string|null $title
     */
    public function __construct(
        public readonly AbstractReaction $reaction,
        public readonly int $count,
        public readonly ?string $title = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->reaction->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->title);
        }
        $buffer .= $serializer->int32($this->count);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $reaction = AbstractReaction::deserialize($deserializer, $stream);
        $title = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $count = $deserializer->int32($stream);
        return new self(
            $reaction,
            $count,
            $title
        );
    }
}