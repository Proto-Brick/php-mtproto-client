<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.startHistoryImport
 */
final class StartHistoryImportRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb43df344;
    
    public string $predicate = 'messages.startHistoryImport';
    
    public function getMethodName(): string
    {
        return 'messages.startHistoryImport';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $importId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $importId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->importId);
        return $buffer;
    }
}