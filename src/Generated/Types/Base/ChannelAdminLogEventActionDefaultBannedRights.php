<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionDefaultBannedRights
 */
final class ChannelAdminLogEventActionDefaultBannedRights extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x2df5fc0a;
    
    public string $predicate = 'channelAdminLogEventActionDefaultBannedRights';
    
    /**
     * @param ChatBannedRights $prevBannedRights
     * @param ChatBannedRights $newBannedRights
     */
    public function __construct(
        public readonly ChatBannedRights $prevBannedRights,
        public readonly ChatBannedRights $newBannedRights
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevBannedRights->serialize();
        $buffer .= $this->newBannedRights->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $prevBannedRights = ChatBannedRights::deserialize($__payload, $__offset);
        $newBannedRights = ChatBannedRights::deserialize($__payload, $__offset);

        return new self(
            $prevBannedRights,
            $newBannedRights
        );
    }
}