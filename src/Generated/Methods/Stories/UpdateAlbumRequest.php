<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StoryAlbum;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.updateAlbum
 */
final class UpdateAlbumRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5e5259b6;
    
    public string $predicate = 'stories.updateAlbum';
    
    public function getMethodName(): string
    {
        return 'stories.updateAlbum';
    }
    
    public function getResponseClass(): string
    {
        return StoryAlbum::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $albumId
     * @param string|null $title
     * @param list<int>|null $deleteStories
     * @param list<int>|null $addStories
     * @param list<int>|null $order
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $albumId,
        public readonly ?string $title = null,
        public readonly ?array $deleteStories = null,
        public readonly ?array $addStories = null,
        public readonly ?array $order = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) {
            $flags |= (1 << 0);
        }
        if ($this->deleteStories !== null) {
            $flags |= (1 << 1);
        }
        if ($this->addStories !== null) {
            $flags |= (1 << 2);
        }
        if ($this->order !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->albumId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfInts($this->deleteStories);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::vectorOfInts($this->addStories);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfInts($this->order);
        }
        return $buffer;
    }
}