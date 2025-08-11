<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionCreateTopic
 */
final class ChannelAdminLogEventActionCreateTopic extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x58707d28;
    
    public string $_ = 'channelAdminLogEventActionCreateTopic';
    
    /**
     * @param AbstractForumTopic $topic
     */
    public function __construct(
        public readonly AbstractForumTopic $topic
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->topic->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $topic = AbstractForumTopic::deserialize($stream);
        return new self(
            $topic
        );
    }
}