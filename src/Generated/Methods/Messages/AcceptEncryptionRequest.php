<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEncryptedChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedChat;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.acceptEncryption
 */
final class AcceptEncryptionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3dbc0415;
    
    public string $predicate = 'messages.acceptEncryption';
    
    public function getMethodName(): string
    {
        return 'messages.acceptEncryption';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEncryptedChat::class;
    }
    /**
     * @param InputEncryptedChat $peer
     * @param string $gB
     * @param int $keyFingerprint
     */
    public function __construct(
        public readonly InputEncryptedChat $peer,
        public readonly string $gB,
        public readonly int $keyFingerprint
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->gB);
        $buffer .= Serializer::int64($this->keyFingerprint);
        return $buffer;
    }
}