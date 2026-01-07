<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangePeerColor
 */
final class ChannelAdminLogEventActionChangePeerColor extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x5796e780;
    
    public string $predicate = 'channelAdminLogEventActionChangePeerColor';
    
    /**
     * @param AbstractPeerColor $prevValue
     * @param AbstractPeerColor $newValue
     */
    public function __construct(
        public readonly AbstractPeerColor $prevValue,
        public readonly AbstractPeerColor $newValue
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
        $__offset += 4; // Constructor ID
        $prevValue = AbstractPeerColor::deserialize($__payload, $__offset);
        $newValue = AbstractPeerColor::deserialize($__payload, $__offset);

        return new self(
            $prevValue,
            $newValue
        );
    }
}