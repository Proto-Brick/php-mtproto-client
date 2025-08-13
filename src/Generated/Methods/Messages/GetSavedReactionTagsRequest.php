<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractSavedReactionTags;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getSavedReactionTags
 */
final class GetSavedReactionTagsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3637e05b;
    
    public string $predicate = 'messages.getSavedReactionTags';
    
    public function getMethodName(): string
    {
        return 'messages.getSavedReactionTags';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedReactionTags::class;
    }
    /**
     * @param int $hash
     * @param AbstractInputPeer|null $peer
     */
    public function __construct(
        public readonly int $hash,
        public readonly ?AbstractInputPeer $peer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->peer !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->peer->serialize();
        }
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}