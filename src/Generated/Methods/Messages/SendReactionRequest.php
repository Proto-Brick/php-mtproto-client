<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReaction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.sendReaction
 */
final class SendReactionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd30d78d4;
    
    public string $predicate = 'messages.sendReaction';
    
    public function getMethodName(): string
    {
        return 'messages.sendReaction';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param true|null $big
     * @param true|null $addToRecent
     * @param list<AbstractReaction>|null $reaction
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly ?true $big = null,
        public readonly ?true $addToRecent = null,
        public readonly ?array $reaction = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->big) {
            $flags |= (1 << 1);
        }
        if ($this->addToRecent) {
            $flags |= (1 << 2);
        }
        if ($this->reaction !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->reaction);
        }
        return $buffer;
    }
}