<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionToggleAntiSpam
 */
final class ChannelAdminLogEventActionToggleAntiSpam extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x64f36dfc;
    
    public string $predicate = 'channelAdminLogEventActionToggleAntiSpam';
    
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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $newValue = (Deserializer::int32($stream) === 0x997275b5);

        return new self(
            $newValue
        );
    }
}