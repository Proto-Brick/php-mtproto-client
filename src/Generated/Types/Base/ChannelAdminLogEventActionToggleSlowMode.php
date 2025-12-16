<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionToggleSlowMode
 */
final class ChannelAdminLogEventActionToggleSlowMode extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x53909779;
    
    public string $predicate = 'channelAdminLogEventActionToggleSlowMode';
    
    /**
     * @param int $prevValue
     * @param int $newValue
     */
    public function __construct(
        public readonly int $prevValue,
        public readonly int $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->prevValue);
        $buffer .= Serializer::int32($this->newValue);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevValue = Deserializer::int32($stream);
        $newValue = Deserializer::int32($stream);

        return new self(
            $prevValue,
            $newValue
        );
    }
}