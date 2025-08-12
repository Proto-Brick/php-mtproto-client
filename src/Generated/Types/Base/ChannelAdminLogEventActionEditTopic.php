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
    
    public string $predicate = 'channelAdminLogEventActionEditTopic';
    
    /**
     * @param AbstractForumTopic $prevTopic
     * @param AbstractForumTopic $newTopic
     */
    public function __construct(
        public readonly AbstractForumTopic $prevTopic,
        public readonly AbstractForumTopic $newTopic
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevTopic->serialize();
        $buffer .= $this->newTopic->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevTopic = AbstractForumTopic::deserialize($stream);
        $newTopic = AbstractForumTopic::deserialize($stream);

        return new self(
            $prevTopic,
            $newTopic
        );
    }
}