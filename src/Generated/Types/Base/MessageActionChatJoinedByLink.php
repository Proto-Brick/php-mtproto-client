<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionChatJoinedByLink
 */
final class MessageActionChatJoinedByLink extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x31224c3;
    
    public string $predicate = 'messageActionChatJoinedByLink';
    
    /**
     * @param int $inviterId
     */
    public function __construct(
        public readonly int $inviterId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->inviterId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $inviterId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $inviterId
        );
    }
}