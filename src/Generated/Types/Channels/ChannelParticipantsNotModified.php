<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Channels;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channels.channelParticipantsNotModified
 */
final class ChannelParticipantsNotModified extends AbstractChannelParticipants
{
    public const CONSTRUCTOR_ID = 0xf0173fe9;
    
    public string $predicate = 'channels.channelParticipantsNotModified';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID

        return new self();
    }
}