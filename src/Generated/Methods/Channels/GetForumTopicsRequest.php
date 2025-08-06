<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ForumTopics;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.getForumTopics
 */
final class GetForumTopicsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xde560d1;
    
    public string $_ = 'channels.getForumTopics';
    
    public function getMethodName(): string
    {
        return 'channels.getForumTopics';
    }
    
    public function getResponseClass(): string
    {
        return ForumTopics::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $offsetDate
     * @param int $offsetId
     * @param int $offsetTopic
     * @param int $limit
     * @param string|null $q
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $offsetDate,
        public readonly int $offsetId,
        public readonly int $offsetTopic,
        public readonly int $limit,
        public readonly ?string $q = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->q !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->channel->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->q);
        }
        $buffer .= $serializer->int32($this->offsetDate);
        $buffer .= $serializer->int32($this->offsetId);
        $buffer .= $serializer->int32($this->offsetTopic);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}