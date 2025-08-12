<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
        $msgId = Deserializer::int32($stream);
        $views = Deserializer::int32($stream);
        $forwards = Deserializer::int32($stream);
        $reactions = Deserializer::int32($stream);

        return new self(
            $msgId,
            $views,
            $forwards,
            $reactions
        );
    }
}