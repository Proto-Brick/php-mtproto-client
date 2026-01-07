<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Stories\Stories;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.getStoriesArchive
 */
final class GetStoriesArchiveRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb4352016;
    
    public string $predicate = 'stories.getStoriesArchive';
    
    public function getMethodName(): string
    {
        return 'stories.getStoriesArchive';
    }
    
    public function getResponseClass(): string
    {
        return Stories::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $offsetId
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $offsetId,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->offsetId);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}