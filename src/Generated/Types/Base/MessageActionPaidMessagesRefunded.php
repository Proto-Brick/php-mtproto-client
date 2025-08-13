<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionPaidMessagesRefunded
 */
final class MessageActionPaidMessagesRefunded extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xac1f1fcd;
    
    public string $predicate = 'messageActionPaidMessagesRefunded';
    
    /**
     * @param int $count
     * @param int $stars
     */
    public function __construct(
        public readonly int $count,
        public readonly int $stars
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::int64($this->stars);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $count = Deserializer::int32($stream);
        $stars = Deserializer::int64($stream);

        return new self(
            $count,
            $stars
        );
    }
}