<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.sendGroupCallEncryptedMessage
 */
final class SendGroupCallEncryptedMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe5afa56d;
    
    public string $predicate = 'phone.sendGroupCallEncryptedMessage';
    
    public function getMethodName(): string
    {
        return 'phone.sendGroupCallEncryptedMessage';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param string $encryptedMessage
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly string $encryptedMessage
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::bytes($this->encryptedMessage);
        return $buffer;
    }
}