<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AffectedMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.readHistory
 */
final class ReadHistoryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe306d3a;
    
    public string $predicate = 'messages.readHistory';
    
    public function getMethodName(): string
    {
        return 'messages.readHistory';
    }
    
    public function getResponseClass(): string
    {
        return AffectedMessages::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $maxId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $maxId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->maxId);
        return $buffer;
    }
}