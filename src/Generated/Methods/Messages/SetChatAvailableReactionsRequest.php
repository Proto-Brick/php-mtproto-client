<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChatReactions;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.setChatAvailableReactions
 */
final class SetChatAvailableReactionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x864b2581;
    
    public string $predicate = 'messages.setChatAvailableReactions';
    
    public function getMethodName(): string
    {
        return 'messages.setChatAvailableReactions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractChatReactions $availableReactions
     * @param int|null $reactionsLimit
     * @param bool|null $paidEnabled
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractChatReactions $availableReactions,
        public readonly ?int $reactionsLimit = null,
        public readonly ?bool $paidEnabled = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->reactionsLimit !== null) {
            $flags |= (1 << 0);
        }
        if ($this->paidEnabled !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->availableReactions->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->reactionsLimit);
        }
        if ($flags & (1 << 1)) {
            $buffer .= ($this->paidEnabled ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        }
        return $buffer;
    }
}