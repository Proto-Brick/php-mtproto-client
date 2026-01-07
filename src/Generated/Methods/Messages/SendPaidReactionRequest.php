<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPaidReactionPrivacy;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.sendPaidReaction
 */
final class SendPaidReactionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x58bbcb50;
    
    public string $predicate = 'messages.sendPaidReaction';
    
    public function getMethodName(): string
    {
        return 'messages.sendPaidReaction';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param int $count
     * @param int $randomId
     * @param AbstractPaidReactionPrivacy|null $private
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly int $count,
        public readonly int $randomId,
        public readonly ?AbstractPaidReactionPrivacy $private = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->private !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::int64($this->randomId);
        if ($flags & (1 << 0)) {
            $buffer .= $this->private->serialize();
        }
        return $buffer;
    }
}