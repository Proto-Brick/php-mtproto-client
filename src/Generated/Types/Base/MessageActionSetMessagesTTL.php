<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionSetMessagesTTL
 */
final class MessageActionSetMessagesTTL extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x3c134d7b;
    
    public string $predicate = 'messageActionSetMessagesTTL';
    
    /**
     * @param int $period
     * @param int|null $autoSettingFrom
     */
    public function __construct(
        public readonly int $period,
        public readonly ?int $autoSettingFrom = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->autoSettingFrom !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->period);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->autoSettingFrom);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $period = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $autoSettingFrom = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($stream) : null;

        return new self(
            $period,
            $autoSettingFrom
        );
    }
}