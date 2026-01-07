<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionStartGroupCall
 */
final class ChannelAdminLogEventActionStartGroupCall extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x23209745;
    
    public string $predicate = 'channelAdminLogEventActionStartGroupCall';
    
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
        $__offset += 4; // Constructor ID
        $call = AbstractInputGroupCall::deserialize($__payload, $__offset);

        return new self(
            $call
        );
    }
}