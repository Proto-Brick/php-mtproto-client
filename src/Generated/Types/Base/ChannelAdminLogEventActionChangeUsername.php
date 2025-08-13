<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeUsername
 */
final class ChannelAdminLogEventActionChangeUsername extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x6a4afc38;
    
    public string $predicate = 'channelAdminLogEventActionChangeUsername';
    
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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevValue = Deserializer::bytes($stream);
        $newValue = Deserializer::bytes($stream);

        return new self(
            $prevValue,
            $newValue
        );
    }
}