<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionDiscardGroupCall
 */
final class ChannelAdminLogEventActionDiscardGroupCall extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xdb9f9140;
    
    public string $predicate = 'channelAdminLogEventActionDiscardGroupCall';
    
    /**
     * @param AbstractInputGroupCall $call
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $call = AbstractInputGroupCall::deserialize($__payload, $__offset);

        return new self(
            $call
        );
    }
}