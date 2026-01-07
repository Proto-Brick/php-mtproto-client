<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\SearchPostsFlood;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.checkSearchPostsFlood
 */
final class CheckSearchPostsFloodRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x22567115;
    
    public string $predicate = 'channels.checkSearchPostsFlood';
    
    public function getMethodName(): string
    {
        return 'channels.checkSearchPostsFlood';
    }
    
    public function getResponseClass(): string
    {
        return SearchPostsFlood::class;
    }
    /**
     * @param string|null $query
     */
    public function __construct(
        public readonly ?string $query = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->query !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->query);
        }
        return $buffer;
    }
}