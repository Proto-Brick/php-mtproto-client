<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageMediaDice
 */
final class MessageMediaDice extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0x3f7ee58b;
    
    public string $predicate = 'messageMediaDice';
    
    /**
     * @param int $value
     * @param string $emoticon
     */
    public function __construct(
        public readonly int $value,
        public readonly string $emoticon
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->value);
        $buffer .= Serializer::bytes($this->emoticon);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $value = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $emoticon = Deserializer::bytes($stream);

        return new self(
            $value,
            $emoticon
        );
    }
}