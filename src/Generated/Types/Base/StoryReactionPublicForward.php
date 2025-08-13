<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/storyReactionPublicForward
 */
final class StoryReactionPublicForward extends AbstractStoryReaction
{
    public const CONSTRUCTOR_ID = 0xbbab2643;
    
    public string $predicate = 'storyReactionPublicForward';
    
    /**
     * @param AbstractMessage $message
     */
    public function __construct(
        public readonly AbstractMessage $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->message->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $message = AbstractMessage::deserialize($stream);

        return new self(
            $message
        );
    }
}