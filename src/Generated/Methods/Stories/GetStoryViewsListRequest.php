<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\StoryViewsList;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.getStoryViewsList
 */
final class GetStoryViewsListRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7ed23c57;
    
    public string $predicate = 'stories.getStoryViewsList';
    
    public function getMethodName(): string
    {
        return 'stories.getStoryViewsList';
    }
    
    public function getResponseClass(): string
    {
        return StoryViewsList::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param string $offset
     * @param int $limit
     * @param true|null $justContacts
     * @param true|null $reactionsFirst
     * @param true|null $forwardsFirst
     * @param string|null $q
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly string $offset,
        public readonly int $limit,
        public readonly ?true $justContacts = null,
        public readonly ?true $reactionsFirst = null,
        public readonly ?true $forwardsFirst = null,
        public readonly ?string $q = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->justContacts) {
            $flags |= (1 << 0);
        }
        if ($this->reactionsFirst) {
            $flags |= (1 << 2);
        }
        if ($this->forwardsFirst) {
            $flags |= (1 << 3);
        }
        if ($this->q !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->q);
        }
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}