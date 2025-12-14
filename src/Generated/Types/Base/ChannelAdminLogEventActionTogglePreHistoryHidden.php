<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionTogglePreHistoryHidden
 */
final class ChannelAdminLogEventActionTogglePreHistoryHidden extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x5f5c95f1;
    
    public string $predicate = 'channelAdminLogEventActionTogglePreHistoryHidden';
    
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
        $newValue = (unpack('V', substr($stream, 0, 4))[1] === 0x997275b5);
        $stream = substr($stream, 4);

        return new self(
            $newValue
        );
    }
}