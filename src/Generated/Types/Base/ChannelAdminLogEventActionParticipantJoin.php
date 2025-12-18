<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionParticipantJoin
 */
final class ChannelAdminLogEventActionParticipantJoin extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x183040d3;
    
    public string $predicate = 'channelAdminLogEventActionParticipantJoin';
    
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