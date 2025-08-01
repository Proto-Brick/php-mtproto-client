<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.updatePinnedForumTopic
 */
final class UpdatePinnedForumTopicRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1814925350;
    
    public string $_ = 'channels.updatePinnedForumTopic';
    
    public function getMethodName(): string
    {
        return 'channels.updatePinnedForumTopic';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $topicId
     * @param bool $pinned
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $topicId,
        public readonly bool $pinned
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize($serializer);
        $buffer .= $serializer->int32($this->topicId);
        $buffer .= ($this->pinned ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}