<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeUsernames
 */
final class ChannelAdminLogEventActionChangeUsernames extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xf04fb3a9;
    
    public string $predicate = 'channelAdminLogEventActionChangeUsernames';
    
    /**
     * @param list<string> $prevValue
     * @param list<string> $newValue
     */
    public function __construct(
        public readonly array $prevValue,
        public readonly array $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfStrings($this->prevValue);
        $buffer .= Serializer::vectorOfStrings($this->newValue);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevValue = Deserializer::vectorOfStrings($stream);
        $newValue = Deserializer::vectorOfStrings($stream);

        return new self(
            $prevValue,
            $newValue
        );
    }
}