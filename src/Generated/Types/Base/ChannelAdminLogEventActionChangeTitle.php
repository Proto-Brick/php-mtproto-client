<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeTitle
 */
final class ChannelAdminLogEventActionChangeTitle extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xe6dfb825;
    
    public string $predicate = 'channelAdminLogEventActionChangeTitle';
    
    /**
     * @param string $prevValue
     * @param string $newValue
     */
    public function __construct(
        public readonly string $prevValue,
        public readonly string $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->prevValue);
        $buffer .= Serializer::bytes($this->newValue);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $prevValue = Deserializer::bytes($__payload, $__offset);
        $newValue = Deserializer::bytes($__payload, $__offset);

        return new self(
            $prevValue,
            $newValue
        );
    }
}