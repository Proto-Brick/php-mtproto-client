<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionChatMigrateTo
 */
final class MessageActionChatMigrateTo extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xe1037f92;
    
    public string $predicate = 'messageActionChatMigrateTo';
    
    /**
     * @param int $channelId
     */
    public function __construct(
        public readonly int $channelId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $channelId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $channelId
        );
    }
}