<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Messages\ForumTopics;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.getForumTopicsByID
 */
final class GetForumTopicsByIDRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb0831eb9;
    
    public string $predicate = 'channels.getForumTopicsByID';
    
    public function getMethodName(): string
    {
        return 'channels.getForumTopicsByID';
    }
    
    public function getResponseClass(): string
    {
        return ForumTopics::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param list<int> $topics
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly array $topics
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::vectorOfInts($this->topics);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}