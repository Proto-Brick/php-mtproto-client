<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionPaidMessagesPrice
 */
final class MessageActionPaidMessagesPrice extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x84b88578;
    
    public string $predicate = 'messageActionPaidMessagesPrice';
    
    /**
     * @param int $stars
     * @param true|null $broadcastMessagesAllowed
     */
    public function __construct(
        public readonly int $stars,
        public readonly ?true $broadcastMessagesAllowed = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->broadcastMessagesAllowed) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->stars);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $broadcastMessagesAllowed = (($flags & (1 << 0)) !== 0) ? true : null;
        $stars = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $stars,
            $broadcastMessagesAllowed
        );
    }
}