<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedChat;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.readEncryptedHistory
 */
final class ReadEncryptedHistoryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7f4b690a;
    
    public string $predicate = 'messages.readEncryptedHistory';
    
    public function getMethodName(): string
    {
        return 'messages.readEncryptedHistory';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputEncryptedChat $peer
     * @param int $maxDate
     */
    public function __construct(
        public readonly InputEncryptedChat $peer,
        public readonly int $maxDate
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->maxDate);
        return $buffer;
    }
}