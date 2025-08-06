<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/postInteractionCountersStory
 */
final class PostInteractionCountersStory extends AbstractPostInteractionCounters
{
    public const CONSTRUCTOR_ID = 0x8a480e27;
    
    public string $_ = 'postInteractionCountersStory';
    
    /**
     * @param int $storyId
     * @param int $views
     * @param int $forwards
     * @param int $reactions
     */
    public function __construct(
        public readonly int $storyId,
        public readonly int $views,
        public readonly int $forwards,
        public readonly int $reactions
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->storyId);
        $buffer .= $serializer->int32($this->views);
        $buffer .= $serializer->int32($this->forwards);
        $buffer .= $serializer->int32($this->reactions);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $storyId = $deserializer->int32($stream);
        $views = $deserializer->int32($stream);
        $forwards = $deserializer->int32($stream);
        $reactions = $deserializer->int32($stream);
        return new self(
            $storyId,
            $views,
            $forwards,
            $reactions
        );
    }
}