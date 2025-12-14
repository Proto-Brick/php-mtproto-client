<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/postInteractionCountersMessage
 */
final class PostInteractionCountersMessage extends AbstractPostInteractionCounters
{
    public const CONSTRUCTOR_ID = 0xe7058e7f;
    
    public string $predicate = 'postInteractionCountersMessage';
    
    /**
     * @param int $msgId
     * @param int $views
     * @param int $forwards
     * @param int $reactions
     */
    public function __construct(
        public readonly int $msgId,
        public readonly int $views,
        public readonly int $forwards,
        public readonly int $reactions
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int32($this->views);
        $buffer .= Serializer::int32($this->forwards);
        $buffer .= Serializer::int32($this->reactions);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $msgId = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $views = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $forwards = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $reactions = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $msgId,
            $views,
            $forwards,
            $reactions
        );
    }
}