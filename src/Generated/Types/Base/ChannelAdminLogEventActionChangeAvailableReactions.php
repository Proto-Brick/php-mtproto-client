<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeAvailableReactions
 */
final class ChannelAdminLogEventActionChangeAvailableReactions extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xbe4e0ef8;
    
    public string $predicate = 'channelAdminLogEventActionChangeAvailableReactions';
    
    /**
     * @param AbstractChatReactions $prevValue
     * @param AbstractChatReactions $newValue
     */
    public function __construct(
        public readonly AbstractChatReactions $prevValue,
        public readonly AbstractChatReactions $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevValue->serialize();
        $buffer .= $this->newValue->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevValue = AbstractChatReactions::deserialize($stream);
        $newValue = AbstractChatReactions::deserialize($stream);

        return new self(
            $prevValue,
            $newValue
        );
    }
}