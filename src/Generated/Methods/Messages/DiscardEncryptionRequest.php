<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.discardEncryption
 */
final class DiscardEncryptionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf393aea0;
    
    public string $predicate = 'messages.discardEncryption';
    
    public function getMethodName(): string
    {
        return 'messages.discardEncryption';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $chatId
     * @param true|null $deleteHistory
     */
    public function __construct(
        public readonly int $chatId,
        public readonly ?true $deleteHistory = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->deleteHistory) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->chatId);
        return $buffer;
    }
}