<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.updatePinnedMessage
 */
final class UpdatePinnedMessageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd2aaf7ec;
    
    public string $predicate = 'messages.updatePinnedMessage';
    
    public function getMethodName(): string
    {
        return 'messages.updatePinnedMessage';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param true|null $silent
     * @param true|null $unpin
     * @param true|null $pmOneside
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly ?true $silent = null,
        public readonly ?true $unpin = null,
        public readonly ?true $pmOneside = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->silent) {
            $flags |= (1 << 0);
        }
        if ($this->unpin) {
            $flags |= (1 << 1);
        }
        if ($this->pmOneside) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        return $buffer;
    }
}