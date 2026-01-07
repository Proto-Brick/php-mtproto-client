<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReaction;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.sendReaction
 */
final class SendReactionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7fd736b2;
    
    public string $predicate = 'stories.sendReaction';
    
    public function getMethodName(): string
    {
        return 'stories.sendReaction';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $storyId
     * @param AbstractReaction $reaction
     * @param true|null $addToRecent
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $storyId,
        public readonly AbstractReaction $reaction,
        public readonly ?true $addToRecent = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->addToRecent) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->storyId);
        $buffer .= $this->reaction->serialize();
        return $buffer;
    }
}