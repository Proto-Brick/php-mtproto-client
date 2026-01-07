<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\CanSendStoryCount;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.canSendStory
 */
final class CanSendStoryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x30eb63f0;
    
    public string $predicate = 'stories.canSendStory';
    
    public function getMethodName(): string
    {
        return 'stories.canSendStory';
    }
    
    public function getResponseClass(): string
    {
        return CanSendStoryCount::class;
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