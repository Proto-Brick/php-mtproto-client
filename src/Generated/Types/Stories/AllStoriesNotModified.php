<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\StoriesStealthMode;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $state = Deserializer::bytes($__payload, $__offset);
        $stealthMode = StoriesStealthMode::deserialize($__payload, $__offset);

        return new self(
            $state,
            $stealthMode
        );
    }
}