<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionEditTopic
 */
final class ChannelAdminLogEventActionEditTopic extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xf06fe208;
    
    public string $_ = 'channelAdminLogEventActionEditTopic';
    
    /**
     * @param AbstractForumTopic $prevTopic
     * @param AbstractForumTopic $newTopic
     */
    public function __construct(
        public readonly AbstractForumTopic $prevTopic,
        public readonly AbstractForumTopic $newTopic
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevTopic->serialize($serializer);
        $buffer .= $this->newTopic->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevTopic = AbstractForumTopic::deserialize($deserializer, $stream);
        $newTopic = AbstractForumTopic::deserialize($deserializer, $stream);
        return new self(
            $prevTopic,
            $newTopic
        );
    }
}