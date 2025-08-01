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
    public const CONSTRUCTOR_ID = 3875901055;
    
    public string $_ = 'postInteractionCountersMessage';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->msgId);
        $buffer .= $serializer->int32($this->views);
        $buffer .= $serializer->int32($this->forwards);
        $buffer .= $serializer->int32($this->reactions);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $msgId = $deserializer->int32($stream);
        $views = $deserializer->int32($stream);
        $forwards = $deserializer->int32($stream);
        $reactions = $deserializer->int32($stream);
            return new self(
            $msgId,
            $views,
            $forwards,
            $reactions
        );
    }
}