<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.searchPosts
 */
final class SearchPostsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf2c4f24d;
    
    public string $predicate = 'channels.searchPosts';
    
    public function getMethodName(): string
    {
        return 'channels.searchPosts';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param int $offsetRate
     * @param AbstractInputPeer $offsetPeer
     * @param int $offsetId
     * @param int $limit
     * @param string|null $hashtag
     * @param string|null $query
     * @param int|null $allowPaidStars
     */
    public function __construct(
        public readonly int $offsetRate,
        public readonly AbstractInputPeer $offsetPeer,
        public readonly int $offsetId,
        public readonly int $limit,
        public readonly ?string $hashtag = null,
        public readonly ?string $query = null,
        public readonly ?int $allowPaidStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hashtag !== null) {
            $flags |= (1 << 0);
        }
        if ($this->query !== null) {
            $flags |= (1 << 1);
        }
        if ($this->allowPaidStars !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->hashtag);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->query);
        }
        $buffer .= Serializer::int32($this->offsetRate);
        $buffer .= $this->offsetPeer->serialize();
        $buffer .= Serializer::int32($this->offsetId);
        $buffer .= Serializer::int32($this->limit);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int64($this->allowPaidStars);
        }
        return $buffer;
    }
}