<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/storyViewPublicForward
 */
final class StoryViewPublicForward extends AbstractStoryView
{
    public const CONSTRUCTOR_ID = 0x9083670b;
    
    public string $predicate = 'storyViewPublicForward';
    
    /**
     * @param AbstractMessage $message
     * @param true|null $blocked
     * @param true|null $blockedMyStoriesFrom
     */
    public function __construct(
        public readonly AbstractMessage $message,
        public readonly ?true $blocked = null,
        public readonly ?true $blockedMyStoriesFrom = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->blocked) {
            $flags |= (1 << 0);
        }
        if ($this->blockedMyStoriesFrom) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->message->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $blocked = (($flags & (1 << 0)) !== 0) ? true : null;
        $blockedMyStoriesFrom = (($flags & (1 << 1)) !== 0) ? true : null;
        $message = AbstractMessage::deserialize($__payload, $__offset);

        return new self(
            $message,
            $blocked,
            $blockedMyStoriesFrom
        );
    }
}