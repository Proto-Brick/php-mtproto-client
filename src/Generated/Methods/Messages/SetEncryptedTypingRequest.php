<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedChat;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.setEncryptedTyping
 */
final class SetEncryptedTypingRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x791451ed;
    
    public string $predicate = 'messages.setEncryptedTyping';
    
    public function getMethodName(): string
    {
        return 'messages.setEncryptedTyping';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputEncryptedChat $peer
     * @param bool $typing
     */
    public function __construct(
        public readonly InputEncryptedChat $peer,
        public readonly bool $typing
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= ($this->typing ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}