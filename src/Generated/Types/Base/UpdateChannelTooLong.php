<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChannelTooLong
 */
final class UpdateChannelTooLong extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x108d941f;
    
    public string $predicate = 'updateChannelTooLong';
    
    /**
     * @param int $channelId
     * @param int|null $pts
     */
    public function __construct(
        public readonly int $channelId,
        public readonly ?int $pts = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pts !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->channelId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->pts);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $channelId = Deserializer::int64($stream);
        $pts = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $channelId,
            $pts
        );
    }
}