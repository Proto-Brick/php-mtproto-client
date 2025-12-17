<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeLocation
 */
final class ChannelAdminLogEventActionChangeLocation extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xe6b76ae;
    
    public string $predicate = 'channelAdminLogEventActionChangeLocation';
    
    /**
     * @param AbstractChannelLocation $prevValue
     * @param AbstractChannelLocation $newValue
     */
    public function __construct(
        public readonly AbstractChannelLocation $prevValue,
        public readonly AbstractChannelLocation $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevValue->serialize();
        $buffer .= $this->newValue->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $prevValue = AbstractChannelLocation::deserialize($__payload, $__offset);
        $newValue = AbstractChannelLocation::deserialize($__payload, $__offset);

        return new self(
            $prevValue,
            $newValue
        );
    }
}