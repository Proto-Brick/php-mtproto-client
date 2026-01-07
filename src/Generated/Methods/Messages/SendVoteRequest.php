<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.sendVote
 */
final class SendVoteRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x10ea6184;
    
    public string $predicate = 'messages.sendVote';
    
    public function getMethodName(): string
    {
        return 'messages.sendVote';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param list<string> $options
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly array $options
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::vectorOfStrings($this->options);
        return $buffer;
    }
}