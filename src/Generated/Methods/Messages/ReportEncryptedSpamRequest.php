<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedChat;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.reportEncryptedSpam
 */
final class ReportEncryptedSpamRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4b0c8c0f;
    
    public string $predicate = 'messages.reportEncryptedSpam';
    
    public function getMethodName(): string
    {
        return 'messages.reportEncryptedSpam';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputEncryptedChat $peer
     */
    public function __construct(
        public readonly InputEncryptedChat $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}