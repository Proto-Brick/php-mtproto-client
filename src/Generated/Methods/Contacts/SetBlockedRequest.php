<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.setBlocked
 */
final class SetBlockedRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x94c65c76;
    
    public string $predicate = 'contacts.setBlocked';
    
    public function getMethodName(): string
    {
        return 'contacts.setBlocked';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<AbstractInputPeer> $id
     * @param int $limit
     * @param true|null $myStoriesFrom
     */
    public function __construct(
        public readonly array $id,
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
        $buffer .= Serializer::vectorOfObjects($this->id);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}