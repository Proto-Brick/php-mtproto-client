<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEncryptedChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.requestEncryption
 */
final class RequestEncryptionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf64daf43;
    
    public string $predicate = 'messages.requestEncryption';
    
    public function getMethodName(): string
    {
        return 'messages.requestEncryption';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEncryptedChat::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param int $randomId
     * @param string $gA
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $randomId,
        public readonly string $gA
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int32($this->randomId);
        $buffer .= Serializer::bytes($this->gA);
        return $buffer;
    }
}