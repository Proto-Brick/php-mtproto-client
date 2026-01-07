<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Contacts\AbstractBlocked;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.getBlocked
 */
final class GetBlockedRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9a868f80;
    
    public string $predicate = 'contacts.getBlocked';
    
    public function getMethodName(): string
    {
        return 'contacts.getBlocked';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBlocked::class;
    }
    /**
     * @param int $offset
     * @param int $limit
     * @param true|null $myStoriesFrom
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $limit,
        public readonly ?true $myStoriesFrom = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->myStoriesFrom) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}