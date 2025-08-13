<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeEmojiStatus
 */
final class ChannelAdminLogEventActionChangeEmojiStatus extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x3ea9feb1;
    
    public string $predicate = 'channelAdminLogEventActionChangeEmojiStatus';
    
    /**
     * @param AbstractEmojiStatus $prevValue
     * @param AbstractEmojiStatus $newValue
     */
    public function __construct(
        public readonly AbstractEmojiStatus $prevValue,
        public readonly AbstractEmojiStatus $newValue
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
        $prevValue = AbstractEmojiStatus::deserialize($stream);
        $newValue = AbstractEmojiStatus::deserialize($stream);

        return new self(
            $prevValue,
            $newValue
        );
    }
}