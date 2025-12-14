<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionChatDeleteUser
 */
final class MessageActionChatDeleteUser extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xa43f30cc;
    
    public string $predicate = 'messageActionChatDeleteUser';
    
    /**
     * @param int $userId
     */
    public function __construct(
        public readonly int $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $userId = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $userId
        );
    }
}