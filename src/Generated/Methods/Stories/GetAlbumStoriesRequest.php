<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\Stories;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.getAlbumStories
 */
final class GetAlbumStoriesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xac806d61;
    
    public string $predicate = 'stories.getAlbumStories';
    
    public function getMethodName(): string
    {
        return 'stories.getAlbumStories';
    }
    
    public function getResponseClass(): string
    {
        return Stories::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $albumId
     * @param int $offset
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $albumId,
        public readonly int $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->albumId);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}