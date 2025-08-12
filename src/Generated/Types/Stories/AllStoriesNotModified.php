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
    
    public string $predicate = 'stories.allStoriesNotModified';
    
    /**
     * @param string $state
     * @param StoriesStealthMode $stealthMode
     */
    public function __construct(
        public readonly string $state,
        public readonly StoriesStealthMode $stealthMode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->state);
        $buffer .= $this->stealthMode->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $state = Deserializer::bytes($stream);
        $stealthMode = StoriesStealthMode::deserialize($stream);

        return new self(
            $state,
            $stealthMode
        );
    }
}