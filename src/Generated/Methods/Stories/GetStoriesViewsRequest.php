<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\StoryViews;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.getStoriesViews
 */
final class GetStoriesViewsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x28e16cc8;
    
    public string $predicate = 'stories.getStoriesViews';
    
    public function getMethodName(): string
    {
        return 'stories.getStoriesViews';
    }
    
    public function getResponseClass(): string
    {
        return StoryViews::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $id
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->id);
        return $buffer;
    }
}