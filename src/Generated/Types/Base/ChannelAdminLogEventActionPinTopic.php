<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionPinTopic
 */
final class ChannelAdminLogEventActionPinTopic extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x5d8d353b;
    
    public string $predicate = 'channelAdminLogEventActionPinTopic';
    
    /**
     * @param AbstractForumTopic|null $prevTopic
     * @param AbstractForumTopic|null $newTopic
     */
    public function __construct(
        public readonly ?AbstractForumTopic $prevTopic = null,
        public readonly ?AbstractForumTopic $newTopic = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->prevTopic !== null) $flags |= (1 << 0);
        if ($this->newTopic !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->prevTopic->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->newTopic->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $prevTopic = ($flags & (1 << 0)) ? AbstractForumTopic::deserialize($stream) : null;
        $newTopic = ($flags & (1 << 1)) ? AbstractForumTopic::deserialize($stream) : null;

        return new self(
            $prevTopic,
            $newTopic
        );
    }
}