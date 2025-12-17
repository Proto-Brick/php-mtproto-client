<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionToggleNoForwards
 */
final class ChannelAdminLogEventActionToggleNoForwards extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xcb2ac766;
    
    public string $predicate = 'channelAdminLogEventActionToggleNoForwards';
    
    /**
     * @param bool $newValue
     */
    public function __construct(
        public readonly bool $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->newValue ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $newValue = (Deserializer::int32($__payload, $__offset) === 0x997275b5);

        return new self(
            $newValue
        );
    }
}