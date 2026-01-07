<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\PeerStories;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.getPeerStories
 */
final class GetPeerStoriesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2c4ada50;
    
    public string $predicate = 'stories.getPeerStories';
    
    public function getMethodName(): string
    {
        return 'stories.getPeerStories';
    }
    
    public function getResponseClass(): string
    {
        return PeerStories::class;
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