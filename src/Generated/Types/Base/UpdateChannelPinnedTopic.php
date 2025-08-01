<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChannelPinnedTopic
 */
final class UpdateChannelPinnedTopic extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 422509539;
    
    public string $_ = 'updateChannelPinnedTopic';
    
    /**
     * @param int $channelId
     * @param int $topicId
     * @param bool|null $pinned
     */
    public function __construct(
        public readonly int $channelId,
        public readonly int $topicId,
        public readonly ?bool $pinned = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->channelId);
        $buffer .= $serializer->int32($this->topicId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $pinned = ($flags & (1 << 0)) ? true : null;
        $channelId = $deserializer->int64($stream);
        $topicId = $deserializer->int32($stream);
            return new self(
            $channelId,
            $topicId,
            $pinned
        );
    }
}