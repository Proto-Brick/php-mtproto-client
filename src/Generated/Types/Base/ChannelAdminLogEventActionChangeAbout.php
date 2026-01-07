<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeAbout
 */
final class ChannelAdminLogEventActionChangeAbout extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x55188a2e;
    
    public string $predicate = 'channelAdminLogEventActionChangeAbout';
    
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
        $__offset += 4; // Constructor ID
        $prevValue = Deserializer::bytes($__payload, $__offset);
        $newValue = Deserializer::bytes($__payload, $__offset);

        return new self(
            $prevValue,
            $newValue
        );
    }
}