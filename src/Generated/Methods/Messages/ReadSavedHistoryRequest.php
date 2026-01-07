<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.readSavedHistory
 */
final class ReadSavedHistoryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xba4a3b5b;
    
    public string $predicate = 'messages.readSavedHistory';
    
    public function getMethodName(): string
    {
        return 'messages.readSavedHistory';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $parentPeer
     * @param AbstractInputPeer $peer
     * @param int $maxId
     */
    public function __construct(
        public readonly AbstractInputPeer $parentPeer,
        public readonly AbstractInputPeer $peer,
        public readonly int $maxId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->parentPeer->serialize();
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->maxId);
        return $buffer;
    }
}