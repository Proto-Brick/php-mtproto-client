<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\StoriesStealthMode;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stories.allStoriesNotModified
 */
final class AllStoriesNotModified extends AbstractAllStories
{
    public const CONSTRUCTOR_ID = 0x1158fe3e;
    
    public string $_ = 'stories.allStoriesNotModified';
    
    /**
     * @param string $state
     * @param StoriesStealthMode $stealthMode
     */
    public function __construct(
        public readonly string $state,
        public readonly StoriesStealthMode $stealthMode
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->state);
        $buffer .= $this->stealthMode->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $state = $deserializer->bytes($stream);
        $stealthMode = StoriesStealthMode::deserialize($deserializer, $stream);
        return new self(
            $state,
            $stealthMode
        );
    }
}