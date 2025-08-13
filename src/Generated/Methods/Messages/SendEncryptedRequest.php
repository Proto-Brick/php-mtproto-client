<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedChat;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractSentEncryptedMessage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.sendEncrypted
 */
final class SendEncryptedRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x44fa7a15;
    
    public string $predicate = 'messages.sendEncrypted';
    
    public function getMethodName(): string
    {
        return 'messages.sendEncrypted';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentEncryptedMessage::class;
    }
    /**
     * @param InputEncryptedChat $peer
     * @param int $randomId
     * @param string $data
     * @param true|null $silent
     */
    public function __construct(
        public readonly InputEncryptedChat $peer,
        public readonly int $randomId,
        public readonly string $data,
        public readonly ?true $silent = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->silent) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= Serializer::bytes($this->data);
        return $buffer;
    }
}