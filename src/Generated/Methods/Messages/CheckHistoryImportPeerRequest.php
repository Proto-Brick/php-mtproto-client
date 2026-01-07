<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\CheckedHistoryImportPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.checkHistoryImportPeer
 */
final class CheckHistoryImportPeerRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5dc60f03;
    
    public string $predicate = 'messages.checkHistoryImportPeer';
    
    public function getMethodName(): string
    {
        return 'messages.checkHistoryImportPeer';
    }
    
    public function getResponseClass(): string
    {
        return CheckedHistoryImportPeer::class;
    }
    /**
     * @param AbstractInputPeer $peer
     */
    public function __construct(
        public readonly AbstractInputPeer $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}