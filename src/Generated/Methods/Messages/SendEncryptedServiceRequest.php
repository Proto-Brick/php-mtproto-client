<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedChat;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractSentEncryptedMessage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.sendEncryptedService
 */
final class SendEncryptedServiceRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x32d439a4;
    
    public string $predicate = 'messages.sendEncryptedService';
    
    public function getMethodName(): string
    {
        return 'messages.sendEncryptedService';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentEncryptedMessage::class;
    }
    /**
     * @param InputEncryptedChat $peer
     * @param int $randomId
     * @param string $data
     */
    public function __construct(
        public readonly InputEncryptedChat $peer,
        public readonly int $randomId,
        public readonly string $data
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->randomId);
        $buffer .= Serializer::bytes($this->data);
        return $buffer;
    }
}