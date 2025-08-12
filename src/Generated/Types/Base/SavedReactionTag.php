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
    
    public string $predicate = 'savedReactionTag';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->reaction->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->title);
        }
        $buffer .= Serializer::int32($this->count);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $reaction = AbstractReaction::deserialize($stream);
        $title = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $count = Deserializer::int32($stream);

        return new self(
            $reaction,
            $count,
            $title
        );
    }
}