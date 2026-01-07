<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.sendQuickReplyMessages
 */
final class SendQuickReplyMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6c750de1;
    
    public string $predicate = 'messages.sendQuickReplyMessages';
    
    public function getMethodName(): string
    {
        return 'messages.sendQuickReplyMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $shortcutId
     * @param list<int> $id
     * @param list<int> $randomId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $shortcutId,
        public readonly array $id,
        public readonly array $randomId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->shortcutId);
        $buffer .= Serializer::vectorOfInts($this->id);
        $buffer .= Serializer::vectorOfLongs($this->randomId);
        return $buffer;
    }
}