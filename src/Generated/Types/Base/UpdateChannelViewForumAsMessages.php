<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChannelViewForumAsMessages
 */
final class UpdateChannelViewForumAsMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x7b68920;
    
    public string $predicate = 'updateChannelViewForumAsMessages';
    
    /**
     * @param int $channelId
     * @param bool $enabled
     */
    public function __construct(
        public readonly int $channelId,
        public readonly bool $enabled
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        $buffer .= ($this->enabled ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $channelId = Deserializer::int64($__payload, $__offset);
        $enabled = (Deserializer::int32($__payload, $__offset) === 0x997275b5);

        return new self(
            $channelId,
            $enabled
        );
    }
}