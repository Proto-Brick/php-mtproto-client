<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
        if ($this->prevTopic !== null) {
            $flags |= (1 << 0);
        }
        if ($this->newTopic !== null) {
            $flags |= (1 << 1);
        }
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
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $prevTopic = (($flags & (1 << 0)) !== 0) ? AbstractForumTopic::deserialize($stream) : null;
        $newTopic = (($flags & (1 << 1)) !== 0) ? AbstractForumTopic::deserialize($stream) : null;

        return new self(
            $prevTopic,
            $newTopic
        );
    }
}