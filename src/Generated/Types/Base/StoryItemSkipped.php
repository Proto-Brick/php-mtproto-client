<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/storyItemSkipped
 */
final class StoryItemSkipped extends AbstractStoryItem
{
    public const CONSTRUCTOR_ID = 4289579283;
    
    public string $_ = 'storyItemSkipped';
    
    /**
     * @param int $id
     * @param int $date
     * @param int $expireDate
     * @param bool|null $closeFriends
     */
    public function __construct(
        public readonly int $id,
        public readonly int $date,
        public readonly int $expireDate,
        public readonly ?bool $closeFriends = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->closeFriends) $flags |= (1 << 8);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->int32($this->expireDate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $closeFriends = ($flags & (1 << 8)) ? true : null;
        $id = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        $expireDate = $deserializer->int32($stream);
            return new self(
            $id,
            $date,
            $expireDate,
            $closeFriends
        );
    }
}