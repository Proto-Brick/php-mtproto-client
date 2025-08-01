<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageViews
 */
final class MessageViews extends AbstractMessageViews
{
    public const CONSTRUCTOR_ID = 1163625789;
    
    public string $_ = 'messageViews';
    
    /**
     * @param int|null $views
     * @param int|null $forwards
     * @param AbstractMessageReplies|null $replies
     */
    public function __construct(
        public readonly ?int $views = null,
        public readonly ?int $forwards = null,
        public readonly ?AbstractMessageReplies $replies = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->views !== null) $flags |= (1 << 0);
        if ($this->forwards !== null) $flags |= (1 << 1);
        if ($this->replies !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->views);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->forwards);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->replies->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $views = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $forwards = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $replies = ($flags & (1 << 2)) ? AbstractMessageReplies::deserialize($deserializer, $stream) : null;
            return new self(
            $views,
            $forwards,
            $replies
        );
    }
}